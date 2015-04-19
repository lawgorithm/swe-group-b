<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantcourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ApplicantCourse', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('sso', 20);
			$table->string('CourseID', 10);
			$table->integer('rank');
			$table->boolean('AcceptStatus');
			$table->string('SectionID', 1)->nullable();
			$table->foreign('sso')
			->references('sso')
			->on('applicant');
			$table->foreign('CourseID')
			->references('CourseID')
			->on('sectionID');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ApplicantCourse');
	}

}
