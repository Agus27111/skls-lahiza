<?php

namespace App\Filament\Resources\PhotoDocumentations\Pages;

use App\Filament\Resources\PhotoDocumentations\PhotoDocumentationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPhotoDocumentations extends ListRecords
{
    protected static string $resource = PhotoDocumentationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
