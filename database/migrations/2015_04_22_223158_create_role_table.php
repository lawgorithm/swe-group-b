<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role', function(Blueprint $table)
		{
            $table->string('sso', 20)->unique();
            //$table->string('lastname', 20)->default('');
            //$table->string('firstname', 20)->default('');
            //$table->string('phone', 10);
            //$table->string('email', 40);
            $table->string('user_role', 10);//applicant, instructor or admin(advisor)
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
		Schema::dropIfExists('role');
	}

}
