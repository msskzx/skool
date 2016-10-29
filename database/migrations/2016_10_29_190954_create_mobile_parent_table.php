<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileParentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_parent', function (Blueprint $table) {
            $table->integer('mobile');
            $table->integer('parent_id')->unsigned();
            $table->timestamps();

            $table->primary(['mobile', 'parent_id']);

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
        Schema::drop('mobile_parent');
    }
}
