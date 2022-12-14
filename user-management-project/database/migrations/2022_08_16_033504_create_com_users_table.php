<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('com_users', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('fname');
			$table->string('lname');
			$table->string('email')->unique();
			$table->date('dob');
			$table->string('Gender');
			$table->string('password');
			$table->timestamps(6);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('com_users');
	}

}
