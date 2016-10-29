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
            $table->integer('teacher_id')->nullable()->unsigned();
            $table->integer('admin_id')->nullable()->unsigned();
            $table->date('date');
            $table->string('location');
            $table->string('type');
            $table->text('equipment');
            $table->mediumtext('description');
            $table->timestamps();

            $table->foreign('teacher_id')
                  ->references('id')
                  ->on('teachers')
                  ->onDelete('set null');

            $table->foreign('admin_id')
                  ->references('id')
                  ->on('administrators')
                  ->onDelete('set null');

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
