<?php

namespace App\Filament\Resources\PpdbPaymentSettings\Pages;

use App\Filament\Resources\PpdbPaymentSettings\PpdbPaymentSettingResource;
use App\Models\PpdbPaymentSetting;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPpdbPaymentSettings extends ListRecords
{
    protected static string $resource = PpdbPaymentSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(fn (): bool => PpdbPaymentSetting::query()->count() === 0),
        ];
    }
}
