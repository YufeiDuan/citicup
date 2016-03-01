<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

use App\Process;

class Authenticate {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest())
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return redirect()->guest('/');
			}
		}
		$process = Process::find(1);
		$curtime = date('Y-m-d H:i:s',time());

		if($curtime>$process->time){
			return view('info')->withErrors('当前时间：'.$curtime.'  大赛报名已截止。');
		}
		else{
			$user = $this->auth->user();
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
