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
			$table->string('sso', 20)->references('sso')->on('applicant')->onDelete('cascade');
			$table->string('courseid', 10)->references('courseid')->on('course')->onDelete('cascade');
			$table->integer('rank');
			$table->boolean('acceptstatus');
			$table->string('feedback', 140);
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
