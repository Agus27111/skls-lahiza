<?php

namespace App\Models;

use App\Models\Concerns\BelongsToSchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoDocumentation extends Model
{
    use HasFactory, BelongsToSchool;

    protected $table = 'video_documentations';

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'youtube_url',
        'youtube_playlist_id',
        'category',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get active videos only (scope)
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order by order column
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
