<?php

namespace App\Filament\Resources\VideoDocumentations\Pages;

use App\Filament\Resources\VideoDocumentations\VideoDocumentationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVideoDocumentations extends ListRecords
{
    protected static string $resource = VideoDocumentationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
