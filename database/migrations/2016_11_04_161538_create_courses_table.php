<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->integer('grade');
            $table->mediumtext('description');
            // $table->timestamps();
            $table->integer('teacher_id')->unsigned()
                                         ->index()
                                         ->nullable();
            $table->integer('school_id')->unsigned()
                                        ->index()
                                        ->nullable();

            $table->foreign('teacher_id')
                  ->references('id')
                  ->on('teachers')
                  ->onDelete('set null');

            $table->foreign('school_id')
                  ->references('id')
                  ->on('schools')
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
        Schema::drop('courses');
    }
}
