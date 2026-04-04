<?php

namespace App\Filament\Resources\SchoolUnits\Pages;

use App\Filament\Resources\SchoolUnits\SchoolUnitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSchoolUnits extends ListRecords
{
    protected static string $resource = SchoolUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
