<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->mediumtext('vision');
            $table->mediumtext('mission');
            $table->mediumtext('general_info');
            $table->integer('phone_number1');
            $table->integer('phone_number2');
            $table->integer('fees');
            $table->string('address');
            $table->string('type');
            $table->string('name');
            $table->string('main_language');
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
        Schema::drop('schools');
    }
}
