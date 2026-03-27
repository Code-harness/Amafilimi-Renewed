<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_id',
        'embed_url',
        'trailer_url',
        'duration',
        'release_year',
        'language',
    ];

    /**
     * The content this movie belongs to.
     */
    public function content(): BelongsTo
    {
        return $this->belongsTo(Content::class);
    }
}
