<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null)
    {
        $roles = [
            'admin'     => 3,
            'company'   => 2,
            'user'      => 1
        ];

        if ($request->user()->role != ($roles[$role])) {
            return view('auth.register')->with(['user' => Auth::user()]);
        }

        return $next($request);


    }
}
