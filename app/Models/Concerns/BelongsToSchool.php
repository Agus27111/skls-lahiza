<?php

namespace App\Models\Concerns;

use App\Models\School;
use App\Models\Scopes\SchoolScope;
use App\Support\Tenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToSchool
{
    public static function bootBelongsToSchool(): void
    {
        static::addGlobalScope(new SchoolScope());

        static::creating(function (Model $model): void {
            if ($model->getAttribute('school_id')) {
                return;
            }

            $schoolId = Tenant::schoolId();

            if ($schoolId === null) {
                return;
            }

            $model->setAttribute('school_id', $schoolId);
        });
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}

