<?php

namespace App\Filament\Pages;

use BackedEnum;
use App\Filament\Widgets\ArticlesOverviewWidget;
use App\Filament\Widgets\PpdbRegistrationsOverviewWidget;
use App\Filament\Widgets\SchoolUnitsOverviewWidget;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationLabel = 'Dashboard';

    protected static string $routePath = 'dashboard';

    protected static ?int $navigationSort = -2;

    public function getWidgets(): array
    {
        return [
PpdbRegistrationsOverviewWidget::class,
            SchoolUnitsOverviewWidget::class,
            ArticlesOverviewWidget::class,
            
        ];
    }
}
