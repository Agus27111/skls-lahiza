<?php

namespace App\Filament\Widgets;

use App\Models\SchoolUnit;
use App\Models\Teacher;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SchoolUnitsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Unit Sekolah', SchoolUnit::count())
                ->description('Jumlah unit sekolah terdaftar')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('primary')
                ->icon('heroicon-o-building-office-2'),

            Stat::make('Guru Aktif', Teacher::where('is_active', true)->count())
                ->description('Guru dengan status aktif')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('info')
                ->icon('heroicon-o-check-badge'),
        ];
    }
}
