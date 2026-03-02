<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Membership;
use Illuminate\Support\Facades\Auth;

class CheckAlreadyInColocation
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        $hasActiveColocation = Membership::where('user_id', $user->id)
            ->whereHas('colocation', function ($query) {
                $query->where('status', 'active');
            })
            ->exists();

        if ($hasActiveColocation) {
            return redirect()
                ->route('user.colocation')
                ->with('error', 'You are already in an active colocation.');
        }

        return $next($request);
    }
}
