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
			$table->string('lastname', 20);
			$table->string('firstname', 20);
			$table->integer('phone');
			$table->string('email', 40);
			$table->date('graddate');
			$table->boolean('graduate');
			$table->integer('speakscore')->nullable();
			//$table->primary('sso');

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
