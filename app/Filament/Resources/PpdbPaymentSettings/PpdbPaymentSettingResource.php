<?php

namespace App\Filament\Resources\PpdbPaymentSettings;

use App\Filament\Resources\PpdbPaymentSettings\Pages\CreatePpdbPaymentSetting;
use App\Filament\Resources\PpdbPaymentSettings\Pages\EditPpdbPaymentSetting;
use App\Filament\Resources\PpdbPaymentSettings\Pages\ListPpdbPaymentSettings;
use App\Filament\Resources\PpdbPaymentSettings\Pages\ViewPpdbPaymentSetting;
use App\Filament\Resources\PpdbPaymentSettings\Schemas\PpdbPaymentSettingForm;
use App\Filament\Resources\PpdbPaymentSettings\Schemas\PpdbPaymentSettingInfolist;
use App\Filament\Resources\PpdbPaymentSettings\Tables\PpdbPaymentSettingsTable;
use App\Models\PpdbPaymentSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PpdbPaymentSettingResource extends Resource
{
    protected static ?string $model = PpdbPaymentSetting::class;

    protected static string|UnitEnum|null $navigationGroup = 'Sistem';

    protected static ?string $navigationLabel = 'Pembayaran PPDB';

    protected static ?string $modelLabel = 'pengaturan pembayaran PPDB';

    protected static ?string $pluralModelLabel = 'pengaturan pembayaran PPDB';

    protected static ?int $navigationSort = 2;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCreditCard;

    protected static ?string $recordTitleAttribute = 'bank_name';

    public static function form(Schema $schema): Schema
    {
        return PpdbPaymentSettingForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PpdbPaymentSettingInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PpdbPaymentSettingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPpdbPaymentSettings::route('/'),
            'create' => CreatePpdbPaymentSetting::route('/create'),
            'view' => ViewPpdbPaymentSetting::route('/{record}'),
            'edit' => EditPpdbPaymentSetting::route('/{record}/edit'),
        ];
    }
}
