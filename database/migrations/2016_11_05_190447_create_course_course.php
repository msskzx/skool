<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_requires_course', function (Blueprint $table) {
            $table->integer('course_id')->unsigned();
            $table->integer('req_course_id')->unsigned();
            $table->timestamps();

            $table->primary(['course_id', 'req_course_id']);

            $table->foreign('course_id')
               ->references('id')
               ->on('courses')
               ->onDelete('cascade');

            $table->foreign('req_course_id')
               ->references('id')
               ->on('courses')
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
        Schema::drop('course_requires_course');
    }
}
