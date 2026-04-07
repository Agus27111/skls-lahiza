<?php

namespace App\Filament\Resources\VideoDocumentations\Pages;

use App\Filament\Resources\VideoDocumentations\VideoDocumentationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditVideoDocumentation extends EditRecord
{
    protected static string $resource = VideoDocumentationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
