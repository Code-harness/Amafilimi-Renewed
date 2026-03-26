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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();

            $table->foreignId('series_id')
                ->constrained('series')
                ->cascadeOnDelete();

            $table->integer('season_number');
            $table->string('title')->nullable(); // e.g. Season 1
            $table->text('description')->nullable();
            $table->string('thumbnail_url')->nullable();

            $table->enum('status', ['draft', 'published'])->default('draft');

            $table->timestamps();

            $table->unique(['series_id', 'season_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seasons');
    }
};
