<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedInteger('school_year_id');
            $table->unsignedInteger('class_id');
            $table->boolean('status'); // Kelas Saat ini == 1 && Kelas lalu == 0
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('school_year_id')->references('id')->on('school_years');
            $table->foreign('class_id')->references('id')->on('classrooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_histories');
    }
}
