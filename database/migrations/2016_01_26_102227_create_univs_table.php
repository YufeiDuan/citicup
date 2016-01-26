<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnivsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('univs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('area_id')->unsigned();
			$table->foreign('area_id')->references('id')->on('areas');
			$table->string('name',20);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('univs');
	}

}
