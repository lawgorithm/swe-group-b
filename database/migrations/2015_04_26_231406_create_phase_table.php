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
			$table->timestamp('open');#Temporal states of events
			$table->timestamp('transition');
			$table->timestamp('close');
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
