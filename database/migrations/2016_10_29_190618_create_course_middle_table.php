<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseMiddleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_middle', function (Blueprint $table) {
           $table->integer('middle_id')->unsigned();
           $table->integer('course_id')->unsigned();
           $table->timestamps();

           $table->primary('course_id');

           $table->foreign('course_id')
             ->references('id')
             ->on('courses')
             ->onDelete('cascade');

           $table->foreign('middle_id')
             ->references('id')
             ->on('middle_levels')
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
        Schema::drop('course_middle');
    }
}
