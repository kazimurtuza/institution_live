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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('banner_short_title')->nullable();
            $table->text('banner_big_title')->nullable();
            $table->text('summery')->nullable();
            $table->text('cat_summery')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_details')->nullable();
            $table->text('page_banner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
