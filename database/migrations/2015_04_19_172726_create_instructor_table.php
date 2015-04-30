<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instructor', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();#event
			$table->string('sso', 20)->unique();#Username String
			$table->string('name', 40)->default('');#FirstName LastName String
			$table->foreign('sso')->references('sso')->on('role')->onDelete('cascade');#If Instructor DNE, then role and subsequent courses should be removed
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('instructor');
	}

}
