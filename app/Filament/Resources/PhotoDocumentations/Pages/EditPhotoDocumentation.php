<?php

namespace App\Filament\Resources\PhotoDocumentations\Pages;

use App\Filament\Resources\PhotoDocumentations\PhotoDocumentationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPhotoDocumentation extends EditRecord
{
    protected static string $resource = PhotoDocumentationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
