<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// class IsVendor extends Middleware
class IsVendor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if (!auth()->check() || !auth()->user()['is_vendor']) abort(403);
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role_id == 4) {
            return $next($request);
        }

        return redirect('/');
    }
}
