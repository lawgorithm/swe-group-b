<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course', function(Blueprint $table)
		{
			$table->timestamps();
			$table->string('courseid', 10)->primary();#CS 4320
			$table->string('coursename', 80);#Software Engineering
			$table->string('instructor', 20)->references('sso')->on('instructor')->onDelete('cascade');#If instructor DNE, their courses should be removed
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('course');
	}

}
