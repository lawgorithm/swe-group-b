<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instructor', function(Blueprint $table)
		{
			$table->string('sso', 20)->default('');
			$table->string('name', 40);
			$table->string('passwordtemp', 20);
			//$table->increments('id');
			//$table->timestamps();
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
		Schema::dropIfExists('instructor');
	}

}
