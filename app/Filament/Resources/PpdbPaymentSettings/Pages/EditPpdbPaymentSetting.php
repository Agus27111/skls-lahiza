<?php

namespace App\Filament\Resources\PpdbPaymentSettings\Pages;

use App\Filament\Resources\PpdbPaymentSettings\PpdbPaymentSettingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPpdbPaymentSetting extends EditRecord
{
    protected static string $resource = PpdbPaymentSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
