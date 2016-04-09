<?php namespace App\Http\Middleware;

use Auth;
use View;
use Closure;
use App\Process;

class HomeMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$process = Process::find(1);
		$curtime = date('Y-m-d H:i:s',time());

		if($curtime>$process->time){
			return view('info')->withErrors('当前时间：'.$curtime.'  大赛报名已截止。');
		}
		else{
			$user = Auth::user();
			if($user->state==0){
				//未验证邮件
				return redirect('/reg/validate');
			}
			else if($user->state==2){
				//已验证邮件，未完善资料
				return redirect('/reg/team');
			}
			else if($user->state==3){
				//填写团队信息，未填写队长信息
				return redirect('/reg/member');
			}
		}
		return $next($request);
	}

}
