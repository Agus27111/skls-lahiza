<?php

namespace App\Models;

use App\Models\Concerns\BelongsToSchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory, BelongsToSchool;

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
     * Get the route key for model binding
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the teacher (author) of this article
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Get all comments for this article
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
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
     * Search articles by title, excerpt, or content - optimized for performance
     */
    public function scopeSearch($query, string $searchTerm)
    {
        $search = '%' . strtolower($searchTerm) . '%';
        return $query->where(function ($q) use ($search) {
            $q->where('title', 'LIKE', $search)
                ->orWhere('excerpt', 'LIKE', $search)
                ->orWhere('category', 'LIKE', $search);
        });
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

    public function getImageUrlAttribute(): ?string
    {
        if (blank($this->image)) {
            return null;
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        if (Str::startsWith($this->image, ['/storage/', 'storage/'])) {
            return asset(ltrim($this->image, '/'));
        }

        return Storage::disk('public')->url($this->image);
    }
}
