<?php

namespace App\Filament\Resources\VideoDocumentations;

use App\Filament\Resources\VideoDocumentations\Pages\CreateVideoDocumentation;
use App\Filament\Resources\VideoDocumentations\Pages\EditVideoDocumentation;
use App\Filament\Resources\VideoDocumentations\Pages\ListVideoDocumentations;
use App\Filament\Resources\VideoDocumentations\Pages\ViewVideoDocumentation;
use App\Filament\Resources\VideoDocumentations\Schemas\VideoDocumentationForm;
use App\Filament\Resources\VideoDocumentations\Schemas\VideoDocumentationInfolist;
use App\Filament\Resources\VideoDocumentations\Tables\VideoDocumentationsTable;
use App\Models\VideoDocumentation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class VideoDocumentationResource extends Resource
{
    protected static ?string $model = VideoDocumentation::class;

    protected static string|UnitEnum|null $navigationGroup = 'Media';

    protected static ?string $navigationLabel = 'Dokumentasi Video';

    protected static ?string $modelLabel = 'dokumentasi video';

    protected static ?string $pluralModelLabel = 'dokumentasi video';

    protected static ?int $navigationSort = 2;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedVideoCamera;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return VideoDocumentationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VideoDocumentationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VideoDocumentationsTable::configure($table);
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
            'index' => ListVideoDocumentations::route('/'),
            'create' => CreateVideoDocumentation::route('/create'),
            'view' => ViewVideoDocumentation::route('/{record}'),
            'edit' => EditVideoDocumentation::route('/{record}/edit'),
        ];
    }
}
