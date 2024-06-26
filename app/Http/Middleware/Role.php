<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $userRole = $request->user()->role;

        if ($userRole !== $role) {
            return abort(403, 'Unauthorized');
        }

        if ($role === 'admin' && $request->path() === 'dashboard') {
            return redirect('admin/dashboard');
        }

        return $next($request);
    }
}
