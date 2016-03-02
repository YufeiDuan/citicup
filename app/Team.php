<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Mail;
use App\Member;
use App\Teacher;
use App\Univ;

class Team extends Model {

	//
	public $timestamps = false;

	protected $fillable = ['authen_id', 'name', 'univ_id', 'title', 'logo'];
	//收件箱邮件
	public function inbox(){
		return $this->hasMany('App\Mail','to_id')->where('del_r','=','0')->orderBy('created_at', 'desc');
;
	}

	//发件箱邮件
	public function outbox(){
		return $this->hasMany('App\Mail','from_id')->where('del_s','=','0')->orderBy('created_at', 'desc');
;
	}

	//未读邮件数量
	public function unreadcount(){
		$recvmail = $this->inbox();
		return $recvmail->where('flag_read','=',false)->count();
	}

	public function members(){
		return $this->hasMany('App\Member');
	}

	public function teachers(){
		return $this->hasMany('App\Teacher');
	}

	public function univ(){
		return $this->belongsTo('App\Univ');
	}

	public function report(){
		return $this->hasOne('App\Report');
	}

	public function documents(){
		return $this->hasMany('App\Document');
	}

}
