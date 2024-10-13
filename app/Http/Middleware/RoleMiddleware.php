<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Access denied.'], 403);
        }

        $user = Auth::user();
        if (!in_array($user->role->name, $roles)) {
            return response()->json(['message' => 'Access denied.'], 403);
        }

        return $next($request);
    }
}
