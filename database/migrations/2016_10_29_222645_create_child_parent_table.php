<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildParentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_parent', function (Blueprint $table) {
            $table->integer('child_id')->unsigned();
            $table->integer('parent_id')->unsigned();
            $table->timestamps();

            $table->primary(['child_id', 'parent_id']);

            $table->foreign('child_id')
               ->references('id')
               ->on('children')
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
        Schema::drop('child_parent');
    }
}
