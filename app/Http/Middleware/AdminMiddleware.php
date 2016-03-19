<?php namespace App\Http\Middleware;

use Closure;
use Session;
use App\Team;
use View;

class AdminMiddleware {

	public function handle($request, Closure $next)
	{
		if (Session::has('fay'))
		{
			$team = Team::find(1);
			$unrc = $team->unreadcount();
			View::share('unrc',$unrc);
			return $next($request);
		}else{
			return redirect('/');
		}
	}
}
