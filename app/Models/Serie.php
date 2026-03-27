<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Serie extends Model
{
    protected $fillable = [
        'content_id',
        'trailer_url',
        'release_year',
        'language',
    ];

    /**
     * Get the content details for the series
     */
    public function content(): BelongsTo
    {
        return $this->belongsTo(Content::class);
    }

    /**
     * Relationship to seasons
     */
    public function seasons(): HasMany
    {
        // specify the foreign key explicitly
        return $this->hasMany(Season::class, 'series_id');
    }

    /**
     * Relationship to episodes through seasons
     */
    public function episodes(): HasManyThrough
    {
        // Episode model, Season model, foreign key on Season (series_id), foreign key on Episode (season_id)
        return $this->hasManyThrough(Episodes::class, Season::class, 'series_id', 'season_id');
    }

    // --- Shortcuts to Content attributes ---
    public function getTitleAttribute(): ?string
    {
        return $this->content?->title;
    }
    public function getSlugAttribute(): ?string
    {
        return $this->content?->slug;
    }
    public function getGenreAttribute(): ?string
    {
        return $this->content?->genre;
    }
    public function getThumbnailUrlAttribute(): ?string
    {
        return $this->content?->thumbnail_url;
    }
    public function getPosterUrlAttribute(): ?string
    {
        return $this->content?->poster_url;
    }
    public function getDescriptionAttribute(): ?string
    {
        return $this->content?->description;
    }
    public function getVisibilityAttribute(): ?string
    {
        return $this->content?->visibility;
    }
    public function getStatusAttribute(): ?string
    {
        return $this->content?->status;
    }
    public function getIsFeaturedAttribute(): bool
    {
        return (bool) $this->content?->is_featured;
    }
    public function getIsFreeAttribute(): bool
    {
        return (bool) $this->content?->is_free;
    }
}
