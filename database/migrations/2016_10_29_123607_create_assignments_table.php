<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->datetime('post_date');
            $table->datetime('due_date');
            $table->mediumtext('content');
            $table->timestamps();

            $table->foreign('teacher_id')
               ->references('id')
               ->on('teachers')
               ->onDelete('cascade');

            $table->foreign('course_id')
               ->references('id')
               ->on('courses')
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
        Schema::drop('assignments');
    }
}
