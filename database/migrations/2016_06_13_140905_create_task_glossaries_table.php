<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskGlossariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('task_glossaries', function (Blueprint $table) {
             $table->increments('id');
             $table->string('rus', 400);
             $table->string('fin', 400);
             $table->timestamps();
             $table->integer('task_id')->unsigned();
             $table->foreign('task_id')->references('id')->on('tasks');
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('task_glossaries');
    }
}
