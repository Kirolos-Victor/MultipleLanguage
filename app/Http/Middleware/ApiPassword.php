<?php

namespace App\Http\Middleware;

use Closure;
use http\Env;
use Illuminate\Http\Request;

class ApiPassword
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
        if($request->api_password != env("API_PASSWORD"))
        {
            return response()->json(['message'=>'Unauthenticated, Please enter the api password.']);
        }
        return $next($request);
    }
}
