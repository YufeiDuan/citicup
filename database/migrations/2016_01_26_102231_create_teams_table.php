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
		Schema::create('teams', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',20);
			$table->integer('univ_id')->unsigned();
			$table->foreign('univ_id')->references('id')->on('univs');
			$table->string('title',50)->nullable();
			$table->string('logo',50);
			$table->integer('authen_id')->unsigned();
			$table->foreign('authen_id')->references('id')->on('authens');
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
