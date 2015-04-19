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
		Schema::create('Applicant', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('sso', 20);
			$table->string('LastName', 20);
			$table->string('Firstname', 20);
			$table->integer('Phone');
			$table->string('Email', 40);
			$table->date('GradDate');
			$table->boolean('Graduate');
			$table->integer('SpeakScore')->nullable();
			$table->primary('SSO');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('applicant');
	}

}
