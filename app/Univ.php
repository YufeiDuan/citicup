<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Team;

class Univ extends Model {

	//
	public $timestamps = false;

	protected $hidden = ['area_id'];

	protected $fillable =['area_id','name'];

	public function teams(){
		return $this->hasMany('App\Team');
	}
}
