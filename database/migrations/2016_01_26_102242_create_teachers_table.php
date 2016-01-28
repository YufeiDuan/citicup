<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teachers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',10);
			$table->string('college',20);
			$table->string('email');
			$table->integer('univ_id')->unsigned();
			$table->foreign('univ_id')->references('id')->on('univs');
			$table->integer('team_id')->unsigned();
			$table->foreign('team_id')->references('id')->on('teams');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teachers');
	}

}
