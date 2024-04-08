<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionAuthentication {
    /**
    * Handle an incoming request.
    *
    * @param  \Closure( \Illuminate\Http\Request ): ( \Symfony\Component\HttpFoundation\Response )  $next
    */

    public function handle( Request $request, Closure $next ): Response {
        if ( !isPermissions( $request->route()->getName() ) ) {
            return redirect()->back()->with( [ 'error' => true, 'message' => "You don't  have permission for this !" ] );
        }
        return $next( $request );
    }
}
