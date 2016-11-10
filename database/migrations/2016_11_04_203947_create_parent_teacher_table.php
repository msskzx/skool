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
        Schema::create('parent_rates_teacher', function (Blueprint $table) {
           $table->integer('parent_id')->unsigned()
                                        ->index();
           $table->integer('teacher_id')->unsigned()
                                        ->index();
           $table->integer('rate');
           $table->timestamps();

           $table->primary(['parent_id', 'teacher_id']);

           $table->foreign('teacher_id')
             ->references('id')
             ->on('teachers')
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
        Schema::drop('parent_rates_teacher');
    }
}
