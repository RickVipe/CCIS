<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      switch ($guard) {
      case 'coordinador':
        if (Auth::guard($guard)->check()) {
          return redirect()->route('coordinadores.index');
        }
        break;
      case 'alumno':
        if (Auth::guard($guard)->check()) {
          return redirect()->route('alumnos.index');
        }
        break;
      case 'docente':
        if (Auth::guard($guard)->check()) {
          return redirect()->route('docentes.index');
        }
        break;
      default:
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }
        break;
    }

        return $next($request);
    }
}
