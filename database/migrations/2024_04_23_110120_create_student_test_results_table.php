<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_test_results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('test_id');
            $table->bigInteger('student_test_id');
            $table->bigInteger('student_id');
            $table->tinyInteger('is_skip')->default(0);
            $table->bigInteger('question_id');
            $table->bigInteger('selected_option_id');
            $table->tinyInteger('is_correct');
            $table->dateTime('ans_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_test_results');
    }
};
