<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UserRoleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,  string $accessrole)
    {
        $userRole = auth()->user()->roles;
        
        // CEK ROLES USER
        if ($accessrole == 'ADMIN' &&  ($userRole == 'ADMIN' || $userRole == 'SUPER-ADMIN' ) ) {
            // REDIRECT TO 403 DONT HAVE ACCESS
            return $next($request);
        }
        return abort(403);


    }

}
