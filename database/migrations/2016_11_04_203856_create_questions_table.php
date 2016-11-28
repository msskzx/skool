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
           $table->string('title');
           $table->mediumtext('question');
           $table->mediumtext('answer')->nullable();
           $table->integer('student_id')->unsigned()
                                        ->index();
           $table->integer('course_id')->unsigned()
                                       ->index();

           $table->foreign('course_id')
             ->references('id')
             ->on('courses')
             ->onDelete('cascade');

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
