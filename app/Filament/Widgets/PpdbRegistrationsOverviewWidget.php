<?php

namespace App\Filament\Widgets;

use App\Models\PpdbRegistration;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PpdbRegistrationsOverviewWidget extends BaseWidget
{
    //tampil pertama

    protected function getStats(): array
    {
        $statuses = PpdbRegistration::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        return [
            Stat::make('Total Pendaftar PPDB', PpdbRegistration::count())
                ->description('Jumlah pendaftar PPDB')
                ->descriptionIcon('heroicon-m-user-plus')
                ->color('info')
                ->icon('heroicon-o-user-plus'),

            Stat::make('Pendaftar Baru', $statuses->get('pending', 0))
                ->description('Status menunggu verifikasi')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning')
                ->icon('heroicon-o-clock'),


        ];
    }
}
