<?php namespace App\Http\Controllers\Admin;

use View;
use Input;
use Session;
use App\Team;
use App\Mail;

use App\Http\Controllers\Controller;

class MailController extends Controller {

	//收件箱首页
	public function index()
	{
		$team = Team::find(1);
		$count = $team->unreadcount();
		$inbox = $team->inbox;
		View::share('inbox',$inbox);
		return view('admin.inbox');
	}

	//发件箱
	public function outbox(){
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		$outbox = $team->outbox;
		View::share('data',['count'=>$count,'name'=>$team->name]);
		View::share('outbox',$outbox);
		return view('outbox');
	}
	//写信页面
	public function newmail(){
		$teams = Team::where('id','>','1')->get();
		View::share('teams',$teams);
		return view('admin.newmail');
	}

	//显示单个邮件
	public function show(){
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);
		
		$mail = Mail::where('uid','=',Input::get('tag'))->first();
		$mail->flag_read=1;
		$mail->save();
		View::share('mail',$mail);
		return view('mailview')->withBack(Input::get('f'));
	}

	//设置已读
	public function update(){
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);

		$tag = Input::get('tag');
		$tags = explode(',',$tag);
		foreach ($tags as $t){
			$mail = Mail::where('uid','=',$t)->first();
			$mail->flag_read=1;
			$mail->save();
		}
		return redirect('/mail');
	}
	//收信方删除邮件
	public function destroy(){
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);

		$tag = Input::get('tag');
		$tags = explode(',',$tag);
		foreach ($tags as $t){
			$mail = Mail::where('uid','=',$t)->first();
			$mail->del_r=1;
			$mail->save();
		}
		return redirect('/mail');
	}

	//发信方删除邮件
	public function dels(){
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);

		$tag = Input::get('tag');
		$tags = explode(',',$tag);
		foreach ($tags as $t){
			$mail = Mail::where('uid','=',$t)->first();
			$mail->del_s=1;
			$mail->save();
		}
		return redirect('/mail/outbox');
	}

	//写新邮件
	public function store(){
		$team = Team::find(1);

		$recvlist = explode(',',Input::get('recvlist'),0);
		foreach ($recvlist as $recv) {
			$mail = new Mail;
			$mail->subject = Input::get('subject');
			$mail->content = Input::get('content');
			$mail->from_id = 1;
			$mail->to_id = $recv;
			$mail->flag_read = 0;
			$mail->del_r = 0;
			$mail->del_s = 0;
			$tag = str_random(10);
			while(Mail::where('uid','=',$tag)->count()>0){
				$tag = str_random(10);
			}
			$mail->uid = $tag;
			$mail->save();
		}
		
		return redirect('/admin/mail')->withErrors('发送成功');
	}
}
