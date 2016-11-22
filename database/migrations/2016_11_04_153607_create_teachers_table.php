<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('years_of_exp');
            $table->integer('salary');
            // $table->timestamps();
            $table->integer('employee_id')->index()
                                          ->unique()
                                          ->unsigned();
            $table->integer('supervisor_id')->index()
                                            ->unsigned()
                                            ->nullable();

            $table->foreign('employee_id')
               ->references('id')
               ->on('employees')
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
        Schema::drop('teachers');
    }
}
