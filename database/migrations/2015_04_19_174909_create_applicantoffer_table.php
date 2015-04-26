<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantofferTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applicantoffer', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('sso', 20);
			$table->string('courseid', 10);
			$table->integer('rank')->index();
			$table->boolean('acceptstatus');
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
		Schema::dropIfExists('applicantoffer');
	}

}
