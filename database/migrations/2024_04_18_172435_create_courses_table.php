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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->string('subject');
            $table->string('payment_type');
            $table->decimal('avg_rating')->default(0);
            $table->string('price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('discount_duration')->nullable();
            $table->string('course_duration');
            $table->string('lesson');
            $table->string('course_level');
            $table->string('language')->nullable();
            $table->string('subtitle_language')->nullable();
            $table->text('summery')->nullable();
            $table->string('cover');
            $table->text('overview')->nullable();
            $table->text('curiculm')->nullable();
            $table->string('instructor');
            $table->text('course_points')->nullable();
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
        Schema::dropIfExists('courses');
    }
};
