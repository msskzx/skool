<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
            $table->integer('supervisor_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->timestamps();

            $table->primary('id');

            $table->foreign('supervisor_id')
               ->references('id')
               ->on('teachers')
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
        Schema::drop('supervisors');
    }
}
