<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('student_id')->unsigned()
                                        ->index();
           $table->integer('course_id')->unsigned()
                                       ->index();
           $table->integer('teacher_id')->unsigned()
                                        ->index()
                                        ->nullable();
           $table->string('title');
           $table->mediumtext('question');
           $table->mediumtext('answer');
           $table->timestamps();

           $table->foreign('course_id')
             ->references('id')
             ->on('courses')
             ->onDelete('cascade');

          $table->foreign('teacher_id')
           ->references('id')
           ->on('teachers')
           ->onDelete('set null');

           $table->foreign('student_id')
             ->references('id')
             ->on('students')
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
        Schema::drop('questions');
    }
}