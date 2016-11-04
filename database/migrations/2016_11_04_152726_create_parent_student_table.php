<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_student', function (Blueprint $table) {
           $table->integer('student_id')->unsigned()
                                      ->index();
           $table->integer('parent_id')->unsigned()
                                       ->index();
           $table->timestamps();

           $table->primary(['student_id', 'parent_id']);

           $table->foreign('student_id')
             ->references('id')
             ->on('students')
             ->onDelete('cascade');

           $table->foreign('parent_id')
             ->references('id')
             ->on('parents')
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
        Schema::drop('parent_student');
    }
}
