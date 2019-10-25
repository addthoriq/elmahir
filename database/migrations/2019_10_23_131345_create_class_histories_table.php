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
            $table->unsignedInteger('class_id');
            $table->unsignedBigInteger('student_id');
            $table->boolean('status'); // Kelas Saat ini == 1 && Kelas lalu == 0
            $table->timestamps();
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
