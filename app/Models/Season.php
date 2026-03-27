<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Season extends Model
{
    protected $fillable = [
        'series_id',
        'season_number',
        'title',
        'description',
        'thumbnail_url',
        'status',
    ];

    /**
     * The series this season belongs to
     */
    public function serie(): BelongsTo
    {
        return $this->belongsTo(Serie::class, 'series_id');
    }

    /**
     * Shortcut to get the parent series title
     */
    public function getSerieTitleAttribute(): ?string
    {
        return $this->serie?->content?->title;
    }

    /**
     * Shortcut to get the parent series slug
     */
    public function getSerieSlugAttribute(): ?string
    {
        return $this->serie?->content?->slug;
    }

    /**
     * All episodes in this season
     */
    public function episodes(): HasMany
    {
        return $this->hasMany(Episodes::class);
    }

    /**
     * Accessor for thumbnail (falls back to series thumbnail if empty)
     */
    public function getThumbnailAttribute(): ?string
    {
        return $this->thumbnail_url ?? $this->serie?->thumbnail_url;
    }

    /**
     * Accessor for description (falls back to series description if empty)
     */
    public function getDescriptionAttribute(): ?string
    {
        return $this->description ?? $this->serie?->content?->description;
    }
}
