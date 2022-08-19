<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSignaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_signatures', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('signed');
			$table->string('full_name');
			$table->bigInteger('user_id')->unsigned()->index('user_signatures_user_id_foreign');
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
		Schema::drop('user_signatures');
	}

}
