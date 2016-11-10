<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('years_of_exp');
            $table->integer('salary');
            $table->timestamps();
            $table->string('username')->index()
                                      ->unique()
                                      ->nullable();
            $table->integer('supervisor_id')->index()
                                            ->unsigned()
                                            ->nullable();

            $table->foreign('username')
               ->references('username')
               ->on('employees')
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
        Schema::drop('teachers');
    }
}
