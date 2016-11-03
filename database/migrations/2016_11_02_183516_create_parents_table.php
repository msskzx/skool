<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('username')->unique()->index();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address');
            $table->integer('phone_number');
            $table->integer('mobile_number1');
            $table->integer('mobile_number2');
            $table->timestamps();

            $table->foreign('username')
                  ->references('username')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('parents');
    }
}
