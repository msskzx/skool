<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseElementaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_elementary', function (Blueprint $table) {
            $table->integer('elementary_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->timestamps();

            $table->primary('course_id');

            $table->foreign('course_id')
               ->references('id')
               ->on('courses')
               ->onDelete('cascade');

            $table->foreign('elementary_id')
               ->references('id')
               ->on('elementary_levels')
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
        Schema::drop('course_elementary');
    }
}
