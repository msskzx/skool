<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_student', function (Blueprint $table) {
           $table->integer('assignment_id')->unsigned()
                                           ->index();
           $table->integer('student_id')->unsigned()
                                        ->index();
           $table->integer('grade');
           $table->mediumtext('solution');
           $table->timestamps();

           $table->primary(['assignment_id', 'student_id']);

           $table->foreign('assignment_id')
             ->references('id')
             ->on('assignments')
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
        Schema::drop('assignment_student');
    }
}
