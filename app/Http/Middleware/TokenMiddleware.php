<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $token,string $foo): Response
    {
        dump($foo);
        // $token = env('TOKEN');
        if($request->input('token')===$token){
            return $next($request);
        }
        abort(403);
        
    }
}
