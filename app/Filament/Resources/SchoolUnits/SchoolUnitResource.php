<?php

namespace App\Filament\Resources\SchoolUnits;

use App\Filament\Resources\SchoolUnits\Pages\CreateSchoolUnit;
use App\Filament\Resources\SchoolUnits\Pages\EditSchoolUnit;
use App\Filament\Resources\SchoolUnits\Pages\ListSchoolUnits;
use App\Filament\Resources\SchoolUnits\Schemas\SchoolUnitForm;
use App\Filament\Resources\SchoolUnits\Tables\SchoolUnitsTable;
use App\Models\SchoolUnit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SchoolUnitResource extends Resource
{
    protected static ?string $model = SchoolUnit::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'School';

    public static function form(Schema $schema): Schema
    {
        return SchoolUnitForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SchoolUnitsTable::configure($table);
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
            'index' => ListSchoolUnits::route('/'),
            'create' => CreateSchoolUnit::route('/create'),
            'edit' => EditSchoolUnit::route('/{record}/edit'),
        ];
    }
}
