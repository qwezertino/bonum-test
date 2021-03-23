<?php

namespace App\Http\Middleware;

use App\Models\UserRole;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @param $role
     * @return mixed
     * @throws AuthenticationException
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::guard()->user();

        if ($user->getRoleName() !== env('APP_ROLE_ADMIN')) {
            if ($user->getRoleName() !== $role) {
                throw new AuthenticationException('Access denied!');
            }
        }

        return $next($request);
    }
}
