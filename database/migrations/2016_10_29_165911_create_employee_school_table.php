<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_school', function (Blueprint $table) {
            $table->integer('employee_id')->unsigned();
            $table->integer('school_id')->unsigned();
            $table->timestamps();

            $table->primary(['employee_id', 'school_id']);

            $table->foreign('employee_id')
                  ->references('id')->on('employees')
                  ->onDelete('cascade');

            $table->foreign('school_id')
                  ->references('id')->on('school')
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
        Schema::drop('employee_school');
    }
}
