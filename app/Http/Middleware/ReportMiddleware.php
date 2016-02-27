<?php namespace App\Http\Middleware;

use Auth;
use View;
use Closure;
use App\Process;

class ReportMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);
		$membercount = $team->members->count();
		if($membercount<3){
			return view('state')->withErrors('请先完成团队组建，每支参赛队伍要求至少3名参赛成员。');
		}
		$process = Process::find(2);
		$curtime = date('Y-m-d H:i:s',time());
		if($curtime>$process->time){
			return view('state')->withErrors('当前时间：'.$curtime.'  项目报告已截止提交。');
		}
		return $next($request);
	}

}
