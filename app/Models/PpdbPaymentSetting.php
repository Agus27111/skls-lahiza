<?php

namespace App\Models;

use App\Models\Concerns\BelongsToSchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpdbPaymentSetting extends Model
{
    use HasFactory, BelongsToSchool;

    protected $table = 'ppdb_payment_settings';

    protected $fillable = [
        'registration_fee',
        'bank_name',
        'account_number',
        'account_holder_name',
        'payment_notes',
        'is_active',
    ];

    protected $attributes = [
        'registration_fee' => 250000,
        'is_active' => true,
    ];

    protected function casts(): array
    {
        return [
            'registration_fee' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saved(function (self $setting): void {
            if (! $setting->is_active) {
                return;
            }

            static::query()
                ->whereKeyNot($setting->getKey())
                ->where('is_active', true)
                ->update(['is_active' => false]);
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getFormattedRegistrationFeeAttribute(): string
    {
        return 'Rp ' . number_format((float) $this->registration_fee, 0, ',', '.');
    }
}
