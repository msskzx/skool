<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHighLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('high_levels', function (Blueprint $table) {
           $table->increments('id');
           $table->timestamps();
           $table->integer('school_id')->unsigned()
                                       ->unique()
                                       ->index();

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
        Schema::drop('high_levels');
    }
}
