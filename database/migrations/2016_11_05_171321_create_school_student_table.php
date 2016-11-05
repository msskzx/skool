<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_student', function (Blueprint $table) {
            $table->integer('school_id')->unsigned()
                                        ->index();
            $table->integer('student_id')->unsigned()
                                         ->index();
            $table->integer('parentt_id')->unsigned()
                                         ->index()
                                         ->nullable();
            $table->boolean('accepted');
            $table->timestamps();

            $table->primary(['school_id','student_id']);

            $table->foreign('school_id')
                  ->references('id')
                  ->on('schools')
                  ->onDelete('cascade');

            $table->foreign('student_id')
                  ->references('id')
                  ->on('students')
                  ->onDelete('cascade');

            $table->foreign('parentt_id')
                  ->references('id')
                  ->on('parentts')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('school_student');
    }
}
