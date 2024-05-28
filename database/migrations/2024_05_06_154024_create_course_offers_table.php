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
        Schema::create('course_offers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('details')->nullable();
            $table->text('first_section')->nullable();
            $table->text('type_one')->nullable();
            $table->text('type_two')->nullable();
            $table->text('type_three')->nullable();
            $table->text('level_one')->nullable();
            $table->text('level_two')->nullable();
            $table->text('level_three')->nullable();
            $table->text('sub_one')->nullable();
            $table->text('sub_two')->nullable();
            $table->text('sub_three')->nullable();
            $table->text('fee_one')->nullable();
            $table->text('fee_two')->nullable();
            $table->text('fee_three')->nullable();
            $table->text('last_section')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_details')->nullable();
            $table->text('page_banner')->nullable();
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
        Schema::dropIfExists('course_offers');
    }
};
