<?php

namespace App\Http\Middleware;

//Utilisation de la façade Auth.
use Illuminate\Support\Facades\Auth;

//Importation de la façade Session pour les messages Flash.
use Illuminate\Support\Facades\Session;

use Closure;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->admin){
            return $next($request);
        }

        return redirect()->route('index');
    }
}
