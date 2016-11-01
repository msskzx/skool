<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiddleLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('middle_levels', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('school_id')->unique()->unsigned()->index();
           $table->timestamps();

           $table->foreign('school_id')
             ->references('id')
             ->on('schools')
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
        Schema::drop('middle_levels');
    }
}
