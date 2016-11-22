<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->integer('phone_number')->nullable();
            $table->integer('mobile_number1')->nullable();
            $table->integer('mobile_number2')->nullable();
            $table->string('address');
            $table->enum('role', ['Admin', 'Teacher']);
            $table->enum('gender', ['Male', 'Female']);
            $table->date('birth_date');
            // $table->timestamps();
            $table->string('username')->unique()
                                      ->index()
                                      ->nullable();
            $table->integer('school_id')->unsigned()
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
        Schema::drop('employees');
    }
}
