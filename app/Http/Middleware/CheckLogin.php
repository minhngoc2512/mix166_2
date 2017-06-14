<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        if (auth::check()) {
            return $next($request);
        }

        return redirect()->route('home');
    }
}
