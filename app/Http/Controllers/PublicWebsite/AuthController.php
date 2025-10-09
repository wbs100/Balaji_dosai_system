<?php

namespace App\Http\Controllers\PublicWebsite;

use App\Http\Controllers\Controller;
use App\Mail\VerifyAccountMail;
use App\Models\PublicUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class AuthController extends Controller
{
    public function AuthLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $credentials['status'] = 'active';

        if (Auth::guard('public_user')->attempt($credentials, $request->has('remember_user'))) {
            $request->session()->regenerate();

            return redirect('/user/dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials or your account is not verified.',
        ])->withInput();
    }

    public function register(Request $request)
    {
        $request->merge(['_form' => 'register']);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:public_users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $verificationToken = Str::random(64);

        // Create user in memory, not in database yet
        $tempUser = new PublicUser([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_token' => $verificationToken,
            'status' => 'inactive',
        ]);

        $url = route('user.verify', ['token' => $verificationToken]);

        try {
            Mail::to($tempUser->email)->send(new VerifyAccountMail($tempUser, $url));

            $tempUser->save();

            return redirect()->back()->with('success', 'Registration successful. Please check your email to verify your account.');
        } catch (TransportExceptionInterface $e) {
            Log::error('Mail sending failed: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to send verification email. Please try again later.');
        }
    }

    public function verify($token)
    {
        $user = PublicUser::where('verification_token', $token)->first();

        if (!$user) {
            return redirect('/user/login')->with('error', 'Invalid or expired verification link.');
        }

        $user->status = 'active';
        $user->verification_token = null;
        $user->save();

        return redirect('/user/login')->with('success', 'Your account has been verified. You can now log in.');
    }

    public function logout(Request $request)
    {
        Auth::guard('public_user')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/user/login');
    }
}
