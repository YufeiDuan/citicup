<?php namespace App\Http\Middleware;

use Auth;
use View;
use Closure;
use App\Process;
use Redirect;
use Request;
use Input;

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
		if(!empty($user)){
			//正常用户
			if($user->state==1){
				return redirect('/home');
			}
			$process = Process::find(1);
			$curtime = date('Y-m-d H:i:s',time());
			if($curtime>$process->time){
				return view('info')->withErrors('当前时间：'.$curtime.'  大赛报名已截止，您的团队未达到组建条件。');
			}
			else if($user->state==0){
				$url = $request->url();
				if(str_contains($url,'validate/')||ends_with($url,'resend')||ends_with($url,'validate')){
					return $next($request);
				}else{
					return view('regsuccess');
				}
				
			}
			else if($user->state==2){
				//已验证邮件，未完善资料
				//return view('newteam');
				$url = $request->url();
				if(ends_with($url,'logo')||ends_with($url,'team')){
					return $next($request);
				}else{
					return redirect('/reg/team');
				}
			}
			else if($user->state==3){
				//填写团队信息，未填写队长信息
				$url = $request->url();
				if(ends_with($url,'member')){
					return $next($request);
				}else{
					return redirect('/reg/member');
				}
			}
		}
		return $next($request);
	}

}
