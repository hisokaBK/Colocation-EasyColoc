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
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = auth()->user();

        if (session()->has('invitation_token')) {
            $token = session('invitation_token');

            $invitation = \App\Models\Invitation::where('token', $token)->first();

            if ($invitation && $invitation->colocation->members->contains($user->id)) {
                session()->forget('invitation_token');
                return redirect()->route('user.dashboard')
                    ->with('error', 'You are already a member of this colocation.');
            }

            session()->forget('invitation_token');
            return redirect()->route('colocation.accept', $token);
        }

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('profile.user');
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
