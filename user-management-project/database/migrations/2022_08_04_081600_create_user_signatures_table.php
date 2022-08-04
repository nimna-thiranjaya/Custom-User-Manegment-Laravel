<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSignaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_signatures', function (Blueprint $table) {
            $table->id();
            $table->string('signed');
            $table->string('full_name');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('com_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_signatures');
    }
}
