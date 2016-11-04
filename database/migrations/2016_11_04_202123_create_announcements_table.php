<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('admin_id')->index()
                                     ->unsigned();
           $table->date('date');
           $table->mediumtext('description');
           $table->string('title');
           $table->string('type');
           $table->timestamps();

           $table->foreign('admin_id')
             ->references('id')
             ->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('announcements');
    }
}
