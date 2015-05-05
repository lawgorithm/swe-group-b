<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applicant', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();#Event
			$table->string('sso', 20)->unique();#Username String
			$table->string('name', 40);#FirstName LastName String
			$table->string('phone', 20);#(555)555-5555
			$table->string('email', 40);#email@test.com
			$table->string('gpa', 4)->nullable();#GPA hundreths precision
			$table->string('graddate', 20);#Summer 2015
			$table->string('program', 20);#BS CS
			$table->string('previouswork', 140)->nullable();#Optional work history
			$table->integer('speakscore')->nullable();#Optional speech score for non-native english speakers
			$table->string('speakdate')->nullable();#Optional date of speech test
            $table->foreign('sso')->references('sso')->on('role')->onDelete('cascade');#If Applicant DNE, then role and subsequent applications should be removed
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('applicant');
	}

}
