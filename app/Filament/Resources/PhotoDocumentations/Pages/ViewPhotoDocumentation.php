<?php

namespace App\Filament\Resources\PhotoDocumentations\Pages;

use App\Filament\Resources\PhotoDocumentations\PhotoDocumentationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPhotoDocumentation extends ViewRecord
{
    protected static string $resource = PhotoDocumentationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
