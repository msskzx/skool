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
           $table->integer('id')->unsigned()
                                ->index();
           // $table->timestamps();

           $table->primary('id');

           $table->foreign('id')
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
