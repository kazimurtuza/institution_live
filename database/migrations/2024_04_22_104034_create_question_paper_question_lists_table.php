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
        Schema::create('question_paper_question_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('question_paper_id');
            $table->bigInteger('question_id');
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('is_delete')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_paper_question_lists');
    }
};
