<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Colocation;

class CheckColocationActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    $colocationId =
        $request->route('id') ??
        $request->route('colocation');

    if (!$colocationId) {
        return $next($request);
    }

    $colocation = Colocation::find($colocationId);

    if (!$colocation) {
        abort(404);
    }

    if ($colocation->status === 'cancelled') {
        return redirect('/user/colocation')
            ->with('error', 'This colocation has been cancelled.');
    }

    return $next($request);
}
}

