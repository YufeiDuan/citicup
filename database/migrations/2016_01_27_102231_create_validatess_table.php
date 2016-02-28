<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('validates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('token',20);
			$table->integer('authen_id')->unsigned()->nullable();
			$table->foreign('authen_id')->references('id')->on('authens');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teams');
	}

}
