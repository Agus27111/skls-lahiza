<?php

namespace App\Filament\Widgets;

use App\Models\HeroSection;
use App\Models\PpdbRegistration;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PpdbRegistrationsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $activeHeroSection = HeroSection::active()
            ->latest('updated_at')
            ->first();

        $isPpdbActive = $activeHeroSection?->is_ppdb_active ?? false;

        $statuses = PpdbRegistration::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        return [
            Stat::make('Status PPDB', $isPpdbActive ? 'Aktif' : 'Tidak Aktif')
                ->description(
                    $isPpdbActive
                        ? 'Pendaftaran PPDB sedang dibuka'
                        : 'Pendaftaran PPDB sedang ditutup'
                )
                ->descriptionIcon($isPpdbActive ? 'heroicon-m-check-circle' : 'heroicon-m-x-circle')
                ->color($isPpdbActive ? 'success' : 'danger')
                ->icon($isPpdbActive ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle'),

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
