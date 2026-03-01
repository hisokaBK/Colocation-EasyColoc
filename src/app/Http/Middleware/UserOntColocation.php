<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOntColocation
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user->memberships()->exists()) {

            return redirect()
                ->route('user.colocation')
                ->with('error', 'déjà on colocation.');
        }

        return $next($request);
    }
}
