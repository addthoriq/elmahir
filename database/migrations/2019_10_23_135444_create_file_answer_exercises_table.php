<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileAnswerExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_answer_exercises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('answer_exercise_id');
            $table->string('name_file');
            $table->string('type_file');
            $table->string('link')->nullable();
            $table->timestamps();
            $table->foreign('answer_exercise_id')->references('id')->on('answer_exercises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_answer_exercises');
    }
}
