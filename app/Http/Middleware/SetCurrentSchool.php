<?php

namespace App\Http\Middleware;

use App\Models\School;
use App\Support\Tenant;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetCurrentSchool
{
    public function handle(Request $request, Closure $next): Response
    {
        Tenant::forget();

        $user = auth()->user();

        if (! $user && class_exists(\Filament\Facades\Filament::class)) {
            $user = \Filament\Facades\Filament::auth()?->user();
        }

        if ($user?->school_id) {
            Tenant::setSchoolId((int) $user->school_id);

            return $next($request);
        }

        $host = $request->getHost();

        $schoolId = once(fn () => School::query()
            ->where('domain', $host)
            ->where('is_active', true)
            ->value('id'));

        Tenant::setSchoolId($schoolId ? (int) $schoolId : null);

        return $next($request);
    }
}

