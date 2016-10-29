<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_school', function (Blueprint $table) {
            $table->timestamps();
            $table->integer('school_id')->unsigned();
            $table->integer('child_SSN');
            $table->boolean('accepted');

            $table->primary(['school_id','child_SSN']);

            $table->foreign('school_id')
               ->references('id')
               ->on('schools')
               ->onDelete('cascade');

            $table->foreign('child_SSN')
               ->references('SSN')
               ->on('children')
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
        Schema::drop('child_school');
    }
}
