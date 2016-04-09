<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('path',50);
			$table->integer('team_id')->unsigned();
			$table->foreign('team_id')->references('id')->on('teams');
			$table->integer('type_id')->unsigned();
			$table->foreign('type_id')->references('id')->on('types');
			$table->integer('freq');
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
		Schema::drop('documents');
	}

}
