<?php namespace App\Http\Middleware;

use Auth;
use View;
use Closure;
use App\Process;
use Redirect;

class RegMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user = Auth::user();
		if(!empty($user)&&($user->state==1)){
				//正常用户
			return redirect('/home');
		}
		$process = Process::find(1);
		$curtime = date('Y-m-d H:i:s',time());
		if($curtime>$process->time){
			return view('info')->withErrors('当前时间：'.$curtime.'  大赛报名已截止。');
		}
		if($user->state==2){
			//已验证邮件，未完善资料
			return redirect('/reg/team');
		}
		return $next($request);
	}

}
