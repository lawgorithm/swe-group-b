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
			$table->increments('id');
			$table->timestamps();
			$table->string('CourseID', 10);
			$table->string('CourseName', 40);
			$table->string('Instruct', 20)->references('sso')->on('Instructor');
			$table->primary('CourseID');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('course');
	}

}
