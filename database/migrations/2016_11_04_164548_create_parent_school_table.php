<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_school', function (Blueprint $table) {
           $table->integer('parent_id')->unsigned();
           $table->integer('school_id')->unsigned();
           $table->mediumtext('review');
           $table->timestamps();

           $table->primary(['school_id', 'parent_id']);

           $table->foreign('school_id')
                 ->references('id')
                 ->on('schools')
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
        Schema::drop('parent_school');
    }
}
