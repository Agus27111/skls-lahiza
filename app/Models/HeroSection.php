<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HeroSection extends Model
{
    use HasFactory;

    protected $table = 'hero_sections';

    protected $fillable = [
        'eyebrow_text',
        'title_prefix',
        'title_highlight',
        'title_suffix',
        'description',
        'primary_button_label',
        'primary_button_url',
        'secondary_button_label',
        'secondary_button_url',
        'image_path',
        'image_alt',
        'floating_badge_label',
        'floating_badge_text',
        'is_active',
    ];

    protected $attributes = [
        'is_active' => true,
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saved(function (self $heroSection): void {
            if (! $heroSection->is_active) {
                return;
            }

            static::query()
                ->whereKeyNot($heroSection->getKey())
                ->where('is_active', true)
                ->update(['is_active' => false]);
        });
    }

    /**
     * Get active hero section only (scope).
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getImageUrlAttribute(): ?string
    {
        if (blank($this->image_path)) {
            return null;
        }

        if (Str::startsWith($this->image_path, ['http://', 'https://'])) {
            return $this->image_path;
        }

        if (Str::startsWith($this->image_path, ['/storage/', 'storage/'])) {
            return asset(ltrim($this->image_path, '/'));
        }

        return Storage::disk('public')->url($this->image_path);
    }
}
