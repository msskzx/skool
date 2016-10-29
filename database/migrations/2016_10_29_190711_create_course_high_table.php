<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseHighTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_high', function (Blueprint $table) {
           $table->integer('high_id')->unsigned();
           $table->integer('course_id')->unsigned();
           $table->timestamps();

           $table->primary('course_id');

           $table->foreign('course_id')
             ->references('id')
             ->on('courses')
             ->onDelete('cascade');

           $table->foreign('high_id')
             ->references('id')
             ->on('high_levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('course_high');
    }
}
