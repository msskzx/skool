->index()<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementaryLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementary_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unique()->unsigned()->index();
            $table->mediumtext('supplies');
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
        Schema::drop('elementary_levels');
    }
}
