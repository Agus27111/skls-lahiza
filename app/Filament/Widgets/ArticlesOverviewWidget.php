<?php

namespace App\Filament\Widgets;

use App\Models\Announcement;
use App\Models\Article;
use App\Models\SchoolUnit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ArticlesOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Unit Aktif', SchoolUnit::where('is_active', true)->count())
                ->description('Unit sekolah dengan status aktif')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success')
                ->icon('heroicon-o-check-badge'),

            Stat::make('Artikel Dipublikasi', Article::published()->count())
                ->description('Artikel dengan status dipublikasi')
                ->descriptionIcon('heroicon-m-eye')
                ->color('success')
                ->icon('heroicon-o-eye'),

            Stat::make('Pengumuman Aktif', Announcement::where('is_active', true)->count())
                ->description('Pengumuman dengan status aktif')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success')
                ->icon('heroicon-o-check-badge'),
        ];
    }
}
