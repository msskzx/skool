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
            $table->string('username')->unique()->index();
            $table->string('email')->unique();
            $table->integer('phone_number');
            $table->integer('mobile_number1');
            $table->integer('mobile_number2');
            $table->string('address');
            $table->integer('school_id')->unsigned()
                                        ->index()
                                        ->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->date('birth_date');
            $table->timestamps();

            $table->foreign('username')
                  ->references('username')
                  ->on('users')
                  ->onDelete('cascade');

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
