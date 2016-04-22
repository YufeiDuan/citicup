<?php namespace App\Http\Middleware;

use Closure;

class NormalMiddleware {

    public function handle($request, Closure $next)
    {
    	$request->setTrustedProxies( [ $request->getClientIp() ] );
        if ($request->secure()) {
            return redirect(url($request->getRequestUri(), [], $secure = 0));
        }
        return $next($request); 
    }
}