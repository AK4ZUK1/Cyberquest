<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Check if the user exists and has a null password (unactivated account)
        $user = User::where('email', $request->email)->first();

        if ($user && is_null($user->password)) {
            // Generate a fresh password reset/activation token
            $token = Password::broker()->createToken($user);
            
            // Send the setup email
            $user->sendPasswordResetNotification($token);

            return back()->with('status', 'Akaun anda belum diaktifkan. Kami telah menghantar pautan tetapan kata laluan baharu ke emel anda.');
        }

        // 2. Proceed with standard authentication for users who have passwords set
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->intended(route('admin.dashboard'));
        } elseif ($user->role === 'pks') {
            return redirect()->intended(route('pks.dashboard'));
        } elseif ($user->role === 'facilitator') {
            return redirect()->intended(route('facilitator.dashboard'));
        }

        return redirect()->intended(route('dashboard'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}