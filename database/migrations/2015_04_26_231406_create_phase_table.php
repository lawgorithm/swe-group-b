<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhaseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phase', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('author', 20);
			$table->timestamp('open');#Temporal states of events
			$table->timestamp('transition');
			$table->timestamp('close');

			$table->foreign('author')->references('sso')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('phase');
	}

}
