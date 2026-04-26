<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthenticationController extends Controller
{
    public function redirect(Request $request)
    {
        // Redirect to GitHub for authentication
        return Socialite::driver('github')->redirect();
    }

    public function callback(Request $request)
    {
        // Handle the callback from GitHub
        $gh_user = Socialite::driver('github')->user();

        // Check if the user already exists in the database
        if ($user = User::where('github_id', $gh_user->getId())->first()) {
            // User exists, log them in
            auth()->login($user);
        } else {
            // User does not exist, create a new user
            $user = User::create([
                'github_id' => $gh_user->getId(),
                'github_username' => $gh_user->getNickname(),
                'name' => $gh_user->getName() ?? $gh_user->getNickname(),
                'email' => $gh_user->getEmail(),
            ]);
            auth()->login($user);
        }

        // Redirect to the home page or wherever you want
        return redirect()->route('developers.keys.index')->with('success', __('You have successfully logged in with GitHub.'));
    }
}
