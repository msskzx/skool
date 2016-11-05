<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumtext('report');
            $table->integer('teacher_id')->unsigned()
                                         ->index();
            $table->integer('student_id')->unsigned()
                                         ->index();
            $table->timestamps();

            $table->foreign('student_id')
              ->references('id')
              ->on('students')
              ->onDelete('cascade');

            $table->foreign('teacher_id')
              ->references('id')
              ->on('teachers')
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
        Schema::drop('reports');
    }
}
