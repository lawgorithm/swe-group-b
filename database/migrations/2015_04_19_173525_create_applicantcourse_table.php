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
		Schema::create('applicantcourse', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('sso', 20);
			$table->string('courseid', 10);
			$table->integer('rank');
			$table->boolean('acceptstatus');
			$table->string('sectionid', 1)->nullable();
			$table->foreign('sso')
			->references('sso')
			->on('applicant');
			$table->foreign('courseid')
			->references('courseid')
			->on('sectionid');
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
