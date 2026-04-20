<?php

namespace App\Models\Scopes;

use App\Support\Tenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SchoolScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $schoolId = Tenant::schoolId();

        if ($schoolId === null) {
            return;
        }

        $builder->where($model->getTable().'.school_id', $schoolId);
    }
}

