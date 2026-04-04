<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $fillable = [
        'name',
        'slug',
        'title',
        'bio',
        'position',
        'image',
        'school_unit_id',
        'email',
        'phone',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the school unit this teacher belongs to
     */
    public function schoolUnit(): BelongsTo
    {
        return $this->belongsTo(SchoolUnit::class);
    }

    /**
     * Get all articles written by this teacher
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    /**
     * Get teacher's full display title
     */
    public function getFullTitleAttribute(): string
    {
        return "{$this->name}, {$this->title}";
    }

    /**
     * Get teacher's position for display
     */
    public function getPositionDisplayAttribute(): string
    {
        return ucwords($this->position);
    }
}
