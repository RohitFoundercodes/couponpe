<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    // Authenticate the user first
    $request->authenticate();

    // Now fetch the authenticated user
    $user = $request->user();

    // Check if the user has role_id = 1
    if ($user->role_id != 1) {
        // Log the user out if the role is not correct
        Auth::logout();
        
        return redirect()->route('login')->withErrors([
            'role' => 'You are not authorized to log in.'
        ]);
    }

    // Regenerate the session after successful login
    $request->session()->regenerate();

    return redirect()->intended(route('dashboard', absolute: false));
}



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
