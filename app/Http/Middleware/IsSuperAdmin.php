<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isSuperAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'super-admin') {
            return $next($request);
        }

        abort(403, 'Acesso não autorizado. Apenas super-admins podem acessar esta área.');
    }
}