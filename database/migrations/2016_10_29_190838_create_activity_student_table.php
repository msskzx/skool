<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_student', function (Blueprint $table) {
            $table->integer('activity_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->boolean('accepted');
            $table->timestamps();

            $table->primary(['activity_id', 'student_id']);

            $table->foreign('activity_id')
               ->references('id')
               ->on('activities')
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
        Schema::drop('activity_student');
    }
}
