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
			$table->string('sso', 20)->references('sso')->on('role')->onDelete('cascade');
			$table->string('name', 40)->default('');
			$table->primary('sso');
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
