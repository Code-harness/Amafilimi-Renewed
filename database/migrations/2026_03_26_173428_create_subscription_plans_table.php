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
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();

            $table->string('name'); // Free, Weekly, Monthly, Yearly
            $table->string('slug')->unique(); // free, weekly, monthly, yearly
            $table->decimal('price', 10, 2)->default(0);
            $table->integer('duration_days')->default(0); // e.g 7, 30, 365
            $table->boolean('is_active')->default(true);

            // Optional future controls
            $table->integer('max_devices')->nullable();
            $table->string('quality')->nullable(); // e.g 720p, 1080p
            $table->boolean('downloads_allowed')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_plans');
    }
};
