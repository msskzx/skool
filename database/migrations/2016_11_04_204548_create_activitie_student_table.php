<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitieStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activitie_student', function (Blueprint $table) {
               $table->integer('activitie_id')->unsigned()
                                              ->index();
               $table->integer('student_id')->unsigned()
                                              ->index();
               $table->boolean('accepted');
               $table->timestamps();

               $table->primary(['activitie_id', 'student_id']);

               $table->foreign('activitie_id')
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
        Schema::drop('activitie_student');
    }
}
