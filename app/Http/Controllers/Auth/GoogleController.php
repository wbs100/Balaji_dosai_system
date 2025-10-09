<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PublicUser;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    // Redirect to Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google callback
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check if user exists
            $user = PublicUser::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Create a new user
                $user = PublicUser::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('123456dummy'),
                    'status' => 'active',
                ]);
            }

            // Only log in if the user is active
            if ($user->status === 'active') {
                Auth::guard('public_user')->login($user, true); // true = remember
                session()->regenerate();

                return redirect('/user/dashboard')->with('success', 'Logged in successfully!');
            }

            return redirect()->route('user.login')
                ->withErrors(['email' => 'Your account is not active.'])
                ->withInput();

        } catch (Exception $e) {
            \Log::error('Google login error: ' . $e->getMessage());
            return redirect()->route('user.login')
                ->with('error', 'Login failed, please try again.');
        }
    }

}
