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
			$table->string('courseid', 10)->unique();
			$table->string('coursename', 40);
			$table->string('instructor', 20)->references('sso')->on('instructor')->onDelete('cascade');
			//$table->increments('id');
			//$table->timestamps();
			//$table->primary('courseid');

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
