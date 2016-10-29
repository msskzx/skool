<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_student', function (Blueprint $table) {
            $table->integer('student_id')->unsigned();
            $table->integer('club_name');
            $table->timestamps();

            $table->primary(['student_id', 'club_name']);

            $table->foreign('student_id')
              ->references('id')
              ->on('students')
              ->onDelete('cascade');

            $table->foreign('club_name')
              ->references('name')
              ->on('clubs')
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
        Schema::drop('club_student');
    }
}
