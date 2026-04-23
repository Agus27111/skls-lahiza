<?php

namespace App\Support;

use App\Models\School;
use Illuminate\Support\Facades\Schema;

final class SchoolContext
{
    public static function current(): ?School
    {
        if (! Schema::hasTable('schools')) {
            return null;
        }

        $schoolId = Tenant::schoolId();

        if (! $schoolId) {
            return null;
        }

        return once(fn () => School::query()->find($schoolId));
    }

    /**
     * @return array{primary:string,secondary:string,font_sans:string,space:array<string,string>}
     */
    public static function tokens(): array
    {
        $school = static::current();

        $primary = filled($school?->primary_color) ? (string) $school->primary_color : '#15803d';
        $secondary = filled($school?->secondary_color) ? (string) $school->secondary_color : '#d97706';
        $fontSans = filled($school?->font_sans) ? (string) $school->font_sans : "Inter, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif";

        return [
            'primary' => $primary,
            'secondary' => $secondary,
            'font_sans' => $fontSans,
            'space' => [
                'xs' => '0.25rem',
                'sm' => '0.5rem',
                'md' => '0.75rem',
                'lg' => '1rem',
                'xl' => '1.5rem',
                '2xl' => '2rem',
            ],
        ];
    }
}
