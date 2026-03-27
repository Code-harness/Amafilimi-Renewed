<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'slug',
        'description',
        'genre',
        'thumbnail_url',
        'poster_url',
        'visibility',
        'status',
        'is_featured',
        'is_free',
        'published_at',
        'created_by',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_free' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * The movie associated with this content.
     */
    public function movie(): HasOne
    {
        return $this->hasOne(Movie::class);
    }

    /**
     * Creator user
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
