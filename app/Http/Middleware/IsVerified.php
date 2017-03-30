<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Closure;

class IsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if( !is_null($request->user()) && !$request->user()->verified){
            Auth::logout();

            return redirect()->back()->with('verified', 'Your account is not verified, please check your email.')->withInput();
        }

        return $next($request);

    }
}
