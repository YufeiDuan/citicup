<?php namespace App\Http\Middleware;

use Closure;

class HttpMiddleware {

    public function handle($request, Closure $next)
    {
    	$request->setTrustedProxies( [ $request->getClientIp() ] );
        if ($request->secure()) {
            //return "12";
            return redirect()->to($request->getRequestUri());
        }
        return $next($request); 
    }
}