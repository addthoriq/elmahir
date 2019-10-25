<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_exercises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('exercise_id');
            $table->string('name_file');
            $table->string('type_file');
            $table->string('link')->nullable();
            $table->timestamps();
            $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_exercises');
    }
}
