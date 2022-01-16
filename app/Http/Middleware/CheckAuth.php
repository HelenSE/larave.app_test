<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        dump(Auth::user()->getAuthPassword());
        $response = $next($request);
//        if(Auth::guest()){
//          return redirect((route('login')));
//           // abort(404);
//        }
        return $next($request);
    }
}
