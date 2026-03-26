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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();

            $table->foreignId('content_id')->unique()->constrained('contents')->cascadeOnDelete();

            // Playback / streaming info
            $table->string('embed_url');
            $table->string('trailer_url')->nullable();

            // Movie metadata
            $table->integer('duration')->nullable(); // in minutes
            $table->year('release_year')->nullable();
            $table->string('language')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
