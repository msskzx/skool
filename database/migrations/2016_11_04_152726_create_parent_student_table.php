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
        Schema::create('parentt_student', function (Blueprint $table) {
           $table->integer('student_id')->unsigned()
                                      ->index();
           $table->integer('parentt_id')->unsigned()
                                       ->index();
           $table->timestamps();

           $table->primary(['student_id', 'parentt_id']);

           $table->foreign('student_id')
             ->references('id')
             ->on('students')
             ->onDelete('cascade');

           $table->foreign('parentt_id')
             ->references('id')
             ->on('parentts')
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
        Schema::drop('parentt_student');
    }
}
