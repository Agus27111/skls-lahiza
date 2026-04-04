<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'category',
        'image',
        'teacher_id',
        'published',
        'published_at',
        'views',
    ];

    protected $casts = [
        'published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Get the teacher (author) of this article
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Get published articles only (scope)
     */
    public function scopePublished($query)
    {
        return $query->where('published', true)->whereNotNull('published_at');
    }

    /**
     * Get articles by category
     */
    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Get recently published articles
     */
    public function scopeRecent($query, int $days = 30)
    {
        return $query->where('published_at', '>=', now()->subDays($days));
    }

    /**
     * Get article author name
     */
    public function getAuthorNameAttribute(): string
    {
        return $this->teacher?->name ?? 'Admin';
    }

    /**
     * Get formatted published date
     */
    public function getFormattedPublishedDateAttribute(): string
    {
        return $this->published_at?->format('d M Y') ?? 'Belum dipublikasikan';
    }

    /**
     * Increment view count
     */
    public function incrementViews(): void
    {
        $this->increment('views');
    }

    /**
     * Get reading time estimate (in minutes)
     */
    public function getReadingTimeAttribute(): int
    {
        $wordCount = str_word_count(strip_tags($this->content));
        return max(1, ceil($wordCount / 200)); // 200 words per minute
    }
}
