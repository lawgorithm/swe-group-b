<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');#fetch new user
			$table->timestamps();
			$table->string('sso', 20);#First and Last Name
			$table->string('name', 40);
			$table->string('email')->unique();#Single account associated with each email
			$table->string('password', 60);
			$table->rememberToken();
			$table->foreign('sso')->references('sso')->on('role')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}

}
