<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->string('supply')->index();
            $table->integer('elementary_level_id')->unsigned()->index();
            $table->timestamps();

            $table->primary(['supply','elementary_level_id']);

            $table->foreign('elementary_level_id')
               ->references('id')
               ->on('elementary_levels')
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
        Schema::drop('supplies');
    }
}
