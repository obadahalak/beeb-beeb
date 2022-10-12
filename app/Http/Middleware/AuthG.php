<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthG
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$guard)
    {
        $user = auth('sanctum')->user();
        if(!$user){
            return response()->json(['message' => 'Unauthenticated'],401);
        }
        if (!$user->tokenCan($guard)) {
            return response()->json(['message' => 'Unauthenticated'],401);
        }

        return $next($request);
    }
}
