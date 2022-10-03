<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('quizs');
        Schema::create('quizs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chapter_id');
            $table->unsignedBigInteger('lesson_id');
            $table->timestamps();
        });
        Schema::create('quiz_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id');
            $table->unsignedBigInteger('user_id');
            $table->string('answer');
            $table->string('answer_correct');
            $table->boolean('is_correct');
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
        Schema::dropIfExists('quizs');
        Schema::dropIfExists('quiz_tests');
    }
};
