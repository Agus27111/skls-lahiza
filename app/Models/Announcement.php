<?php

namespace App\Models;

use App\Models\Concerns\BelongsToSchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model
{
    use HasFactory, BelongsToSchool;

    protected $table = 'announcements';

    protected $fillable = [
        'title',
        'content',
        'type',
        'icon',
        'is_active',
        'is_featured',
        'school_unit_id',
        'published_at',
        'archived_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
        'archived_at' => 'datetime',
    ];

    /**
     * Get the school unit this announcement belongs to
     */
    public function schoolUnit(): BelongsTo
    {
        return $this->belongsTo(SchoolUnit::class);
    }

    /**
     * Get active announcements only (scope)
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->whereNull('archived_at');
    }

    /**
     * Get featured announcements
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->active();
    }

    /**
     * Get announcements by type
     */
    public function scopeByType($query, string $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Archive announcement
     */
    public function archive(): void
    {
        $this->update([
            'archived_at' => now(),
            'is_active' => false,
        ]);
    }

    /**
     * Publish announcement
     */
    public function publish(): void
    {
        $this->update([
            'published_at' => now(),
            'is_active' => true,
        ]);
    }

    /**
     * Get type badge color for UI
     */
    public function getTypeBadgeColorAttribute(): string
    {
        return match ($this->type) {
            'success' => 'bg-green-100 text-green-800',
            'warning' => 'bg-yellow-100 text-yellow-800',
            'error' => 'bg-red-100 text-red-800',
            'event' => 'bg-primary/10 text-primary',
            default => 'bg-blue-100 text-blue-800',
        };
    }

    /**
     * Get Lucide icon name
     */
    public function getIconAttribute($value): string
    {
        if ($value) return $value;

        return match ($this->type) {
            'success' => 'check-circle',
            'warning' => 'alert-circle',
            'error' => 'x-circle',
            'event' => 'calendar',
            default => 'info',
        };
    }
}
