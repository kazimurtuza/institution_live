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
        Schema::create('course_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id');
            $table->bigInteger('customer_id');
            $table->string('course_price')->nullable();
            $table->string('payment_type');
            $table->string('payment_getway')->nullable();
            $table->string('transaction_no')->nullable();
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
        Schema::dropIfExists('course_subscriptions');
    }
};
