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
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('chairman_short_message')->nullable();
            $table->text('chairman_details_message')->nullable();
            $table->text('chairman_pic')->nullable();
            $table->text('vission_short_message')->nullable();
            $table->text('vission_details_message')->nullable();
            $table->text('vission_pic')->nullable();
            $table->text('mission_short_message')->nullable();
            $table->text('mission_one_title')->nullable();
            $table->text('mission_one_details')->nullable();
            $table->text('mission_two_title')->nullable();
            $table->text('mission_two_details')->nullable();
            $table->text('mission_pic')->nullable();
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
        Schema::dropIfExists('about_pages');
    }
};
