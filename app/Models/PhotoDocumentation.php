<?php

namespace App\Models;

use App\Models\Concerns\BelongsToSchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoDocumentation extends Model
{
    use HasFactory, BelongsToSchool;

    protected $table = 'photo_documentations';

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'category',
        'caption',
        'photo_date',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'photo_date' => 'date',
    ];

    /**
     * Get active photos only (scope)
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
