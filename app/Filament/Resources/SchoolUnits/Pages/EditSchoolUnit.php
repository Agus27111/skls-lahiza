<?php

namespace App\Filament\Resources\SchoolUnits\Pages;

use App\Filament\Resources\SchoolUnits\SchoolUnitResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSchoolUnit extends EditRecord
{
    protected static string $resource = SchoolUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
