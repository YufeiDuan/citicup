<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Team;

class Univ extends Model {

	//
	public $timestamps = false;

	protected $hidden = ['area_id'];

	public function teams(){
		return $this->hasMany('App\Team');
	}
}
