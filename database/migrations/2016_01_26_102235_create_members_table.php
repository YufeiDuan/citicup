<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',10);
			$table->boolean('sex');
			$table->integer('univ_id')->unsigned();
			$table->foreign('univ_id')->references('id')->on('univs');
			$table->string('college',20);
			$table->string('major',20);
			$table->string('stu_num',15);
			$table->string('id_num',18)->unique();
			$table->tinyInteger('degree');
			$table->integer('year_entry');
			$table->string('email');
			$table->integer('team_id')->unsigned();
			$table->foreign('team_id')->references('id')->on('teams');
			$table->boolean('leader');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('members');
	}

}
