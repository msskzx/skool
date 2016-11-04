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
            $table->integer('student_id')->unsigned()
                                         ->index();
            $table->integer('club_id')->unsigned()
                                      ->index();
            $table->timestamps();

            $table->primary(['student_id', 'club_id']);

            $table->foreign('student_id')
              ->references('id')
              ->on('students')
              ->onDelete('cascade');

            $table->foreign('club_id')
              ->references('id')
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
