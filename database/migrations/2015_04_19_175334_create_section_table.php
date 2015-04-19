<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('section', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('sectionid', 1)->primary();
			$table->string('sectionname', 20);
			$table->string('ta', 20);
			$table->string('courseid', 10)->references('courseid')->on('course');
			$table->date('dttm');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('section');
	}

}
