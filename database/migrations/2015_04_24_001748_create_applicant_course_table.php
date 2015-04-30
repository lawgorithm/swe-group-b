<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applicantcourse', function(Blueprint $table)
		{
			$table->timestamps();#Event
			$table->string('sso', 20);#Username String
			$table->string('courseid', 10);#CS 4320
			$table->string('action', 3);#Accept Status
			$table->integer('rank')->nullable();#Applicant Rank for a given course, from 1 to MaxStudents
			$table->string('feedback', 500)->nullable();#Instructor Feedback, if any
			$table->foreign('sso')->references('sso')->on('applicant')->onDelete('cascade');#If Applicant DNE then their applications to courses should be removed
			$table->foreign('courseid')->references('courseid')->on('course')->onDelete('cascade');#If Course DNE then applicants to course should be removed
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('applicantcourse');
	}

}
