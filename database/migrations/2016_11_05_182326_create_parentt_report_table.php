<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParenttReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_repliesOn_report', function (Blueprint $table) {
            $table->integer('parent_id')->unsigned()
                                        ->index();
            $table->integer('report_id')->unsigned()
                                        ->index();
            $table->text('parent_comment');
            $table->text('teacher_comment')->nullable();
            // $table->timestamps();

            $table->primary(['report_id','parent_id']);

            $table->foreign('report_id')
              ->references('id')
              ->on('reports')
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
        Schema::drop('parent_repliesOn_report');
    }
}
