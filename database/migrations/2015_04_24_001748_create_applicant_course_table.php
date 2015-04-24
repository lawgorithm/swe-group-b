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
			$table->string('sso', 20)->references('sso')->on('applicant')->onDelete('cascade');
			$table->string('courseid', 10)->references('courseid')->on('course')->onDelete('cascade');
			$table->string('action', 3);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('applicantcourse');
	}

}
