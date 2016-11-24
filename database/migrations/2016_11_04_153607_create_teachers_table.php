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
            $table->integer('id')->index()
                                 ->unsigned();
            $table->integer('years_of_exp');
            $table->integer('salary')->virtualAs('years_of_exp * 500');
            // $table->timestamps();
            $table->integer('supervisor_id')->index()
                                            ->unsigned()
                                            ->nullable();

            $table->primary('id');

            $table->foreign('supervisor_id')
                  ->references('id')
                  ->on('teachers')
                  ->onDelete('set null');

            $table->foreign('id')
                  ->references('id')
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
