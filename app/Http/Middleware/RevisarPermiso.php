<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RevisarPermiso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        $user = $request->user();
        // Verificar si el usuario tiene el permiso necesario
        if (!$user->hasPermissionTo($permission)) {
            abort(403, 'Acceso no autorizado.');
        }
        return $next($request);
    }
}
