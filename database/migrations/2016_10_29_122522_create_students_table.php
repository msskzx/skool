<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('username')->unique();
            $table->string('password');
            $table->integer('grade');
            $table->integer('child_id');
            $table->integer('school_id')->unsigned();

            $table->foreign('child_id')
               ->references('SSN')
               ->on('children');

            $table->foreign('school_id')
               ->references('id')
               ->on('schools');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
