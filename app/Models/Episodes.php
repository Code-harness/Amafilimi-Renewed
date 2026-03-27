<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episodes extends Model
{
    protected $fillable = [
        'content_id',
        'season_id',
        'episode_number',
        'embed_url',
        'duration',
        'release_year',
        'language',
    ];

    /**
     * The season this episode belongs to
     */
    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    /**
     * The content details for this episode
     */
    public function content(): BelongsTo
    {
        return $this->belongsTo(Content::class);
    }

    /**
     * Shortcut to get the series through season
     */
    public function series()
    {
        return $this->season->series();
    }
}
