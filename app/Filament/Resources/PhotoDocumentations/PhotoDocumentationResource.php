<?php

namespace App\Filament\Resources\PhotoDocumentations;

use App\Filament\Resources\PhotoDocumentations\Pages\CreatePhotoDocumentation;
use App\Filament\Resources\PhotoDocumentations\Pages\EditPhotoDocumentation;
use App\Filament\Resources\PhotoDocumentations\Pages\ListPhotoDocumentations;
use App\Filament\Resources\PhotoDocumentations\Pages\ViewPhotoDocumentation;
use App\Filament\Resources\PhotoDocumentations\Schemas\PhotoDocumentationForm;
use App\Filament\Resources\PhotoDocumentations\Schemas\PhotoDocumentationInfolist;
use App\Filament\Resources\PhotoDocumentations\Tables\PhotoDocumentationsTable;
use App\Models\PhotoDocumentation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PhotoDocumentationResource extends Resource
{
    protected static ?string $model = PhotoDocumentation::class;

    protected static string|UnitEnum|null $navigationGroup = 'Media';

    protected static ?string $navigationLabel = 'Dokumentasi Foto';

    protected static ?string $modelLabel = 'dokumentasi foto';

    protected static ?string $pluralModelLabel = 'dokumentasi foto';

    protected static ?int $navigationSort = 1;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return PhotoDocumentationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PhotoDocumentationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PhotoDocumentationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPhotoDocumentations::route('/'),
            'create' => CreatePhotoDocumentation::route('/create'),
            'view' => ViewPhotoDocumentation::route('/{record}'),
            'edit' => EditPhotoDocumentation::route('/{record}/edit'),
        ];
    }
}
