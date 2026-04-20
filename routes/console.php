<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('tenants:backfill-school-id {--school= : Target school id (defaults to first school)}', function () {
    $schoolId = $this->option('school');

    if ($schoolId === null) {
        $schoolId = DB::table('schools')->orderBy('id')->value('id');
    }

    if (! $schoolId) {
        $this->error('No school found. Create one first (seed/migration) then retry.');
        return 1;
    }

    $tables = [
        'users',
        'school_units',
        'teachers',
        'articles',
        'announcements',
        'video_documentations',
        'photo_documentations',
        'comments',
        'hero_sections',
        'about_pages',
        'ppdb_payment_settings',
        'ppdb_registration_sequences',
        'ppdb_registrations',
    ];

    foreach ($tables as $table) {
        if (! Schema::hasTable($table) || ! Schema::hasColumn($table, 'school_id')) {
            continue;
        }

        $affected = DB::table($table)
            ->whereNull('school_id')
            ->update(['school_id' => (int) $schoolId]);

        $this->line("{$table}: updated {$affected} rows.");
    }

    $this->info('Done.');
    return 0;
})->purpose('Backfill NULL school_id rows to a target school');
