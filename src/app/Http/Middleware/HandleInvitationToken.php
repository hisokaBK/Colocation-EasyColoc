<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Invitation;

class HandleInvitationToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->route('token');

        $invitation = Invitation::where('token', $token)
            ->where('status', 'pending')
            ->first();

        if (!$invitation) {
            abort(404, 'Invitation not found or already used.');
        }

        if (!Auth::check()) {
            session(['invitation_token' => $token]);
            return redirect()->route('register');
        }

        $user = Auth::user();
        if ($invitation->colocation->members->contains($user->id)) {
            abort(403, 'You are already a member of this colocation.');
        }

        return $next($request);
    }
}
