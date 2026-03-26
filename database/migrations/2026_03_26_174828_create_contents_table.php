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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();

            // Core identity
            $table->enum('type', ['movie', 'series', 'episode']);
            $table->string('title');
            $table->string('slug')->unique();

            // Description / presentation
            $table->text('description')->nullable();
            $table->string('genre')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->string('poster_url')->nullable();

            // Visibility / publishing
            $table->enum('visibility', ['public', 'private', 'premium'])->default('public');
            $table->enum('status', ['draft', 'published', 'scheduled'])->default('draft');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_free')->default(false);

            // Tracking / publishing metadata
            $table->timestamp('published_at')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
