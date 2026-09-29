<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class PksActivationController extends Controller
{
    // Show the form to set the password
    public function create(Request $request, $token)
    {
        // Automatically clear any existing logged-in session (like an admin session) 
        // to prevent the guest middleware from redirecting away from the activation page.
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return view('auth.set-password', ['token' => $token, 'email' => $request->email]);
    }

    // Handle saving the new password and logging the user in
    public function store(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Here we use Laravel's password broker to validate the token and update the user's password
        $status = Password::broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            // Log the user in automatically after setting password
            $user = \App\Models\User::where('email', $request->email)->first();
            if ($user) {
                auth()->login($user);
                
                // Redirect based on role
                if ($user->role === 'pks') {
                    return redirect()->route('pks.dashboard')->with('success', 'Kata laluan berjaya ditetapkan!');
                }
            }
            return redirect('/login')->with('status', __($status));
        }

        return back()->withErrors(['email' => [__($status)]]);
    }
}