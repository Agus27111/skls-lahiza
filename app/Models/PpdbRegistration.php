<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PpdbRegistration extends Model
{
    use HasFactory;

    protected $table = 'ppdb_registrations';

    protected $fillable = [
        'registration_number',
        'school_unit_id',
        'student_name',
        'student_birth_date',
        'student_gender',
        'student_address',
        'parent_name',
        'parent_phone',
        'parent_email',
        'parent_address',
        'parent_relationship',
        'family_card_path',
        'father_id_card_path',
        'mother_id_card_path',
        'birth_certificate_path',
        'status',
        'registration_fee',
        'fee_paid',
        'notes',
        'confirmed_at',
    ];

    protected $casts = [
        'student_birth_date' => 'date',
        'fee_paid' => 'boolean',
        'confirmed_at' => 'datetime',
    ];

    /**
     * Get the school unit this registration belongs to
     */
    public function schoolUnit(): BelongsTo
    {
        return $this->belongsTo(SchoolUnit::class);
    }

    /**
     * Calculate student age
     */
    public function getAgeAttribute(): int
    {
        return $this->student_birth_date->diffInYears(now());
    }

    /**
     * Get student birth date formatted
     */
    public function getFormattedBirthDateAttribute(): string
    {
        return $this->student_birth_date->format('d M Y');
    }

    /**
     * Generate unique registration number (if not already set)
     */
    public static function generateRegistrationNumber(): string
    {
        $year = date('Y');
        $randomId = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        return "REG-{$year}-{$randomId}";
    }

    /**
     * Confirm/approve registration
     */
    public function confirm(?string $notes = null): void
    {
        $this->update([
            'status' => 'confirmed',
            'confirmed_at' => now(),
            'notes' => $notes ?? $this->notes,
        ]);
    }

    /**
     * Accept registration (final approval)
     */
    public function accept(?string $notes = null): void
    {
        $this->update([
            'status' => 'accepted',
            'confirmed_at' => now(),
            'notes' => $notes ?? $this->notes,
        ]);
    }

    /**
     * Reject registration
     */
    public function reject(?string $notes = null): void
    {
        $this->update([
            'status' => 'rejected',
            'notes' => $notes,
        ]);
    }

    /**
     * Mark fee as paid
     */
    public function markFeePaid(): void
    {
        $this->update([
            'fee_paid' => true,
        ]);
    }
}
