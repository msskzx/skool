<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parentt_teacher', function (Blueprint $table) {
           $table->integer('parentt_id')->unsigned()
                                        ->index();
           $table->integer('teacher_id')->unsigned()
                                        ->index();
           $table->integer('rate');
           $table->timestamps();

           $table->primary(['parentt_id', 'teacher_id']);

           $table->foreign('teacher_id')
             ->references('id')
             ->on('teachers')
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
        Schema::drop('parentt_teacher');
    }
}
