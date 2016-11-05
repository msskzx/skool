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
        Schema::create('parentt_report', function (Blueprint $table) {
            $table->text('teacher_comment');
            $table->text('parent_comment');
            $table->integer('parentt_id')->unsigned()
                                         ->index();
            $table->integer('report_id')->unsigned()
                                         ->index();
            $table->timestamps();

            $table->primary(['report_id','parentt_id']);

            $table->foreign('report_id')
              ->references('id')
              ->on('reports')
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
        Schema::drop('parentt_report');
    }
}
