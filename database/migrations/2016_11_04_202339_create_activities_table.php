<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
           $table->increments('id');
           $table->date('date');
           $table->string('location');
           $table->string('type');
           $table->text('equipment')->nullable();
           $table->mediumtext('description');
           $table->integer('teacher_id')->index()
                                        ->unsigned();
           $table->integer('admin_id')->index()
                                      ->unsigned();
           $table->integer('school_id')->index()
                                      ->unsigned();

           $table->foreign('school_id')
                 ->references('id')
                 ->on('schools')
                 ->onDelete('cascade');

           $table->foreign('teacher_id')
                 ->references('id')
                 ->on('teachers')
                 ->onDelete('cascade');

           $table->foreign('admin_id')
                 ->references('id')
                 ->on('admins')
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
        Schema::drop('activities');
    }
}
