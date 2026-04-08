<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AboutPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'eyebrow_text',
        'hero_title',
        'hero_description',
        'history_title',
        'history_paragraphs',
        'history_image_path',
        'history_image_alt',
        'vision_text',
        'mission_text',
        'goal_text',
        'core_values_heading',
        'core_values',
        'school_units_heading',
        'school_units_description',
        'teachers_heading',
        'teachers_description',
        'facilities_title',
        'facilities',
        'facilities_image_path',
        'facilities_image_alt',
        'programs_title',
        'programs',
        'cta_title',
        'cta_description',
        'cta_primary_label',
        'cta_primary_url',
        'cta_secondary_label',
        'cta_secondary_url',
        'is_active',
    ];

    protected $attributes = [
        'is_active' => true,
    ];

    protected function casts(): array
    {
        return [
            'history_paragraphs' => 'array',
            'core_values' => 'array',
            'facilities' => 'array',
            'programs' => 'array',
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saved(function (self $aboutPage): void {
            if (! $aboutPage->is_active) {
                return;
            }

            static::query()
                ->whereKeyNot($aboutPage->getKey())
                ->where('is_active', true)
                ->update(['is_active' => false]);
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getHistoryImageUrlAttribute(): ?string
    {
        return $this->resolveImageUrl($this->history_image_path);
    }

    public function getFacilitiesImageUrlAttribute(): ?string
    {
        return $this->resolveImageUrl($this->facilities_image_path);
    }

    private function resolveImageUrl(?string $path): ?string
    {
        if (blank($path)) {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        if (Str::startsWith($path, ['/storage/', 'storage/'])) {
            return asset(ltrim($path, '/'));
        }

        return Storage::disk('public')->url($path);
    }
}
