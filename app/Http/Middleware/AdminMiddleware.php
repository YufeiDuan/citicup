<?php namespace App\Http\Middleware;

use Closure;
use Session;

class AdminMiddleware {

	public function handle($request, Closure $next)
	{
		if (Session::has('fay'))
		{
			return $next($request);
		}else{
			return redirect('/');
		}
	}
}
