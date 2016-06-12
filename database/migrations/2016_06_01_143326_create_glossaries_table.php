<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlossariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glossaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rus', 400);
            $table->string('fin', 400);
            $table->timestamps();
            $table->integer('exercise_id')->unsigned()->nullable();
            $table->foreign('exercise_id')->references('id')->on('exercises');
			$table->integer('task_id')->unsigned()->nullable();
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
        Schema::drop('glossaries');
    }
}
