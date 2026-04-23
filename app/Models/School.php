<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'domain',
        'logo',
        'address',
        'phone',
        'primary_color',
        'secondary_color',
        'font_sans',
        'filament_primary',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function schoolUnits(): HasMany
    {
        return $this->hasMany(SchoolUnit::class);
    }

    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class);
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }

    public function getLogoUrlAttribute(): ?string
    {
        if (blank($this->logo)) {
            return null;
        }

        if (Str::startsWith($this->logo, ['http://', 'https://'])) {
            return $this->logo;
        }

        if (Str::startsWith($this->logo, ['/storage/', 'storage/'])) {
            return asset(ltrim($this->logo, '/'));
        }

        return Storage::disk('public')->url($this->logo);
    }
}
