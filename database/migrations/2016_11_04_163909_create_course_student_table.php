<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_has_student', function (Blueprint $table) {
           $table->integer('course_id')->unsigned()
                                       ->index();
           $table->integer('student_id')->unsigned()
                                        ->index();
         //   $table->timestamps();

           $table->primary(['course_id', 'student_id']);

           $table->foreign('student_id')
             ->references('id')
             ->on('students')
             ->onDelete('cascade');

           $table->foreign('course_id')
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
        Schema::drop('course_has_student');
    }
}
