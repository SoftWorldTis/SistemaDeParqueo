<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRolesPermisos
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
        $user = $request->user();

        // Verificar si el usuario tiene los roles y permisos necesarios
        if (!$user->hasAnyRole(['admin', 'editor']) || !$user->can('create-post')) {
            abort(403, 'Acceso no autorizado.');
        }
        return $next($request);
    }
}
