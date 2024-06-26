<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Log;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
//            return route('login');
            if ($this->auth->guard('api')->guest()) {
                return response()->json(['error' => 'Unauthenticated.'], 401);
            }
        }
    }

    //    public function handle($request, Closure $next, ...$guards)
    //    {
    //        Log::info($request->headers->all());
    //        if ($this->auth->guard('api')->guest()) {
    //            return response()->json(['error' => 'Unauthenticated.'], 401);
    //        }
    //
    //        return $next($request);
    //    }
}

