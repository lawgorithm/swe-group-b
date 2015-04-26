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
			$table->timestamps();
			$table->string('sso', 20)->unique();
			$table->string('name', 40);
			$table->string('phone', 20);
			$table->string('email', 40);
			$table->string('gpa', 4)->nullable();
			$table->string('graddate', 20);
			$table->string('program', 20);
			$table->string('previouswork', 140)->nullable();
			$table->integer('speakscore')->nullable();
			$table->string('speakdate')->nullable();

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
