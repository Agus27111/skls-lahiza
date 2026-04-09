<?php

namespace App\Filament\Resources\PpdbPaymentSettings\Pages;

use App\Filament\Resources\PpdbPaymentSettings\PpdbPaymentSettingResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPpdbPaymentSetting extends ViewRecord
{
    protected static string $resource = PpdbPaymentSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
