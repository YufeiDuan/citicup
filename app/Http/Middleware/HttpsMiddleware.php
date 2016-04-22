<?php namespace App\Http\Middleware;

use Closure;

class HttpsMiddleware {

    public function handle($request, Closure $next)
    {
    	$request->setTrustedProxies( [ $request->getClientIp() ] );
        if (!$request->secure()) {
            //return "12";
            return redirect()->secure($request->getRequestUri());
        }
        return $next($request); 
    }
}