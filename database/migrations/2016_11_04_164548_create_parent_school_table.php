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
        Schema::create('parentt_school', function (Blueprint $table) {
           $table->integer('parentt_id')->unsigned()
                                        ->index();
           $table->integer('school_id')->unsigned()
                                       ->index();
           $table->mediumtext('review');
           $table->timestamps();

           $table->primary(['school_id', 'parentt_id']);

           $table->foreign('school_id')
                 ->references('id')
                 ->on('schools')
                 ->onDelete('cascade');

           $table->foreign('parentt_id')
                 ->references('id')
                 ->on('parentts')
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
        Schema::drop('parentt_school');
    }
}
