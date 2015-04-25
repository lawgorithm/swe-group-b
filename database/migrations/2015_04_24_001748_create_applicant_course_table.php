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
			$table->timestamps();
			$table->string('sso', 20);
			$table->string('courseid', 10);
			$table->string('action', 3);
			$table->foreign('sso')->references('sso')->on('applicant')->onDelete('cascade');
			$table->foreign('courseid')->references('courseid')->on('course')->onDelete('cascade');
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
