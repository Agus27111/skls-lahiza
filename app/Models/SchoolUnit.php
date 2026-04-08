<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolUnit extends Model
{
    use HasFactory;

    protected $table = 'school_units';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'philosophy',
        'featured_program',
        'featured_programs',
        'max_quota',
        'is_active',
    ];

    protected $casts = [
        'featured_programs' => 'array',
        'is_active' => 'boolean',
    ];

    public function getFeaturedProgramsListAttribute(): array
    {
        $programs = collect($this->featured_programs)
            ->map(function ($item) {
                if (is_array($item)) {
                    return $item['program'] ?? null;
                }

                return $item;
            })
            ->filter()
            ->values()
            ->all();

        if ($programs !== []) {
            return $programs;
        }

        return filled($this->featured_program)
            ? [$this->featured_program]
            : [];
    }

    /**
     * Get all PPDB registrations for this school unit
     */
    public function registrations(): HasMany
    {
        return $this->hasMany(PpdbRegistration::class);
    }

    /**
     * Get all teachers in this school unit
     */
    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class);
    }

    /**
     * Get all announcements for this school unit
     */
    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }

    /**
     * Get current registration count
     */
    public function getCurrentRegistrationCount(): int
    {
        return $this->registrations()->where('status', '!=', 'rejected')->count();
    }

    /**
     * Check if unit has available quota
     */
    public function hasAvailableQuota(): bool
    {
        return $this->getCurrentRegistrationCount() < $this->max_quota;
    }
}
