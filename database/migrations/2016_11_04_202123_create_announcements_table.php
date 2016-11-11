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
           $table->string('title');
           $table->string('type');
           $table->date('date');
           $table->mediumtext('description');
           $table->timestamps();
           $table->integer('admin_id')->index()
                                      ->unsigned();
           $table->integer('school_id')->index()
                                       ->unsigned();

           $table->foreign('admin_id')
                 ->references('id')
                 ->on('admins')
                 ->onDelete('cascade');

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
        Schema::drop('announcements');
    }
}
