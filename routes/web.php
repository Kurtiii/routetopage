<?php

use Illuminate\Support\Facades\Route;
use League\Flysystem\Filesystem;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/file', function () {
    return view('file');
});

Route::get('/created', function () {
    return view('created');
});

Route::get('/developers', function () {
    return view('developers');
})->name('developers');

Route::get('/support', function () {
    return view('faq.index');
})->name('faq.index');

Route::get('/privacy', function () {
    return view('faq.privacy');
})->name('faq.privacy');

Route::get('/guidelines', function () {
    return view('faq.guidelines');
})->name('faq.guidelines');

Route::post('/route', [App\Http\Controllers\RouteCodeController::class, 'store'])
    ->name('route.store');

Route::get('/route/created', function () {
    $route = App\Models\RouteCode::where('code', request('code'))->first();
    if (!$route) {
        return redirect()->route('index')->with('error', __('Route not found.'));
    }

    return view('created', [
        'route' => $route,
    ]);
})->name('route.created');

Route::get('/r/{code}', [App\Http\Controllers\RouteCodeController::class, 'show'])
    ->name('route.show')
    ->where('code', '[A-Z0-9]{5}');

Route::get('/cleanup', [App\Http\Controllers\RouteCodeController::class, 'cleanup'])
    ->name('route.cleanup');
