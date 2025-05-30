<?php

namespace App\Http\Controllers;

use App\Models\RouteCode;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class RouteCodeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'input' => 'nullable|string|max:255',
            'file' => 'nullable|file|max:1024000', // 1 GB in KB
            'routeExpiration' => 'nullable|string',
            'type' => 'required|string|in:url,file',
        ]);

        // check if input is a valid route code
        if (strlen($request->input('input')) == 5) {
            $ip_hash = md5(request()->ip());
            if (RateLimiter::tooManyAttempts('open-route:'.$ip_hash, $perMinute = 20)) {
                return view('ratelimit');
            }
            RateLimiter::increment('open-route:'.$ip_hash);

            $existingCode = RouteCode::where('code', $request->input('input'))->first();
            if ($existingCode) {
                return redirect()->route('route.show', ['code' => $existingCode->code]);
            } else {
                return redirect()->back()->with(
                    'error',
                    __('The route code does not exist (anymore).')
                );
            }
        }

        $valid_until = strtotime(request()->input('routeExpiration'));
        if ($valid_until && $valid_until < time()) {
            return redirect()->back()->with(
                'error',
                __('The expiration date must be in the future.')
            );
        }

        // URL
        if (request()->input('type') === 'url') {
            // check if the input is a valid URL
            if (!filter_var(request()->input('input'), FILTER_VALIDATE_URL)) {
                return redirect()->back()->with(
                    'error',
                    __('The input must be a valid URL or a 5-character route code.')
                );
            }

            $ip_hash = md5(request()->ip());
            if (RateLimiter::tooManyAttempts('create-route:'.$ip_hash, $perMinute = 5)) {
                return view('ratelimit');
            }
            RateLimiter::increment('create-route:'.$ip_hash);

            // create a new route code
            $routeCode = new RouteCode();
            $routeCode->code = strtoupper(Str::random(5));
            $routeCode->type = "url";
            $routeCode->url = request()->input('input');
            $routeCode->valid_until = $valid_until ? date('Y-m-d H:i:s', $valid_until) : null;
            $routeCode->save();

            return redirect()->route('route.created', ['code' => $routeCode->code]);
        }

        // File
        if (request()->input('type') === 'file') {
            // upload to s3
            if (!$request->hasFile('file') || !$request->file('file')->isValid()) {
                return redirect()->back()->with(
                    'error',
                    __('You must upload a valid file.')
                );
            }

            $ip_hash = md5(request()->ip());
            if (RateLimiter::tooManyAttempts('create-route:'.$ip_hash, $perMinute = 5)) {
                return view('ratelimit');
            }
            RateLimiter::increment('create-route:'.$ip_hash);

            $file = $request->file('file');
            $filePath = 'uploads/' . Str::random(40) . '/' . $file->getClientOriginalName();

            // store the file in S3
            Storage::disk('s3')->put($filePath, $file->get());

            // check if date is set and valid
            if ($valid_until > time() + 7 * 24 * 60 * 60 OR !$valid_until) {
                $valid_until = time() + 7 * 24 * 60 * 60;
            }

            // create a new route code
            $routeCode = new RouteCode();
            $routeCode->code = strtoupper(Str::random(5));
            $routeCode->type = "file";
            $routeCode->file_path = $filePath;
            $routeCode->valid_until = date('Y-m-d H:i:s', $valid_until);
            $routeCode->save();

            return redirect()->route('route.created', ['code' => $routeCode->code]);
        }

        return redirect()->back()->with(
            'error',
            __('Something went wrong. Please try again.')
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code)
    {
        $ip_hash = md5(request()->ip());
        if (RateLimiter::tooManyAttempts('open-route:'.$ip_hash, $perMinute = 20)) {
            return view('ratelimit');
        }
        RateLimiter::increment('open-route:'.$ip_hash);

        $route = RouteCode::where('code', $code)->first();

        if (!$route) {
            return redirect()->route('index')->with(
                'error',
                __('The route code does not exist (anymore).')
            );
        }

        if (!$route->isValid()) {
            return redirect()->route('index')->with(
                'error',
                __('The route code is no longer valid.')
            );
        }

        if ($route->type === 'file') {
            $signedUrl = Storage::disk('s3')->temporaryUrl(
                $route->file_path,
                now()->addMinutes(60),
                [
                    'ResponseContentDisposition' => 'attachment; filename=' . basename($route->file_path),
                ]
            );
            if (!$signedUrl) {
                return redirect()->route('index')->with(
                    'error',
                    __('The file is no longer available.')
                );
            }

            if (request()->has('direct_download')){
                return redirect($signedUrl);
            }

            return view('file', ['route' => $route, 'signedUrl' => $signedUrl]);
        }
        if ($route->type === 'url') {
            return redirect($route->url);
        }

        return false;
    }

    /**
     * Cleanup old routes.
     */
    public function cleanup()
    {
        // delete all [URL] routes that are no longer valid
        RouteCode::where('valid_until', '<', now())
            ->where('valid_until', '!=', null)
            ->where('type', 'url')
            ->delete();

        // delete all [FILE] routes that are no longer valid (and delete the file from S3)
        RouteCode::where('valid_until', '<', now())
            ->where('valid_until', '!=', null)
            ->where('type', 'file')
            ->each(function ($route) {
                Storage::disk('s3')->delete($route->file_path);
                $route->delete();
            });

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'Cleanup completed successfully.',
        ]);
    }
}
