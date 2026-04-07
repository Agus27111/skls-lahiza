<?php

namespace App\Filament\Resources\VideoDocumentations\Pages;

use App\Filament\Resources\VideoDocumentations\VideoDocumentationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewVideoDocumentation extends ViewRecord
{
    protected static string $resource = VideoDocumentationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
