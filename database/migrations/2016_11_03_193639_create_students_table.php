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
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->integer('SSN')->unique();
            $table->integer('grade')->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->date('birth_date');
            $table->integer('school_id')->unsigned()
                                        ->index()
                                        ->nullable();
            $table->string('username')->unique()
                                      ->index()
                                      ->nullable();

            $table->foreign('username')
                  ->references('username')
                  ->on('users')
                  ->onDelete('set null');

            $table->foreign('school_id')
                  ->references('id')
                  ->on('schools')
                  ->onDelete('set null');
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
