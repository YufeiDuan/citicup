<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Team;

class Mail extends Model {

	use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function sender(){
    	return $this->hasOne('App\Team','id','from_id');
    }

    public function receiver(){
    	return $this->hasOne('App\Team','id','to_id');
    }
}
