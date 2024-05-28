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
        Schema::create('contact_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('page_summery')->nullable();
            $table->text('contact_head')->nullable();
            $table->text('contact_summery')->nullable();
            $table->text('form_head')->nullable();
            $table->text('form_summery')->nullable();
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('map_source')->nullable();
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
        Schema::dropIfExists('contact_pages');
    }
};
