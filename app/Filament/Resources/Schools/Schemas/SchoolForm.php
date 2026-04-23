<?php

namespace App\Filament\Resources\Schools\Schemas;

use App\Models\School;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SchoolForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profil Sekolah')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('domain')
                            ->label('Domain')
                            ->helperText('Opsional. Contoh: sekolah-a.test atau sekolah-a.domain.com')
                            ->maxLength(255)
                            ->unique(School::class, 'domain', ignoreRecord: true),
                        FileUpload::make('logo')
                            ->label('Logo')
                            ->image()
                            ->disk('public')
                            ->directory('schools/logos')
                            ->imageEditor()
                            ->helperText('Upload logo tenant. Jika kosong, akan pakai logo default.'),
                        TextInput::make('phone')
                            ->label('Telepon')
                            ->maxLength(50),
                        Textarea::make('address')
                            ->label('Alamat')
                            ->rows(3)
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true)
                            ->required(),
                    ]),
                Section::make('Design Tokens')
                    ->description('Mengatur warna primary/secondary, logo, dan font untuk tenant ini.')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        ColorPicker::make('primary_color')
                            ->label('Primary Color')
                            ->helperText('Format HEX, contoh: #15803d'),
                        ColorPicker::make('secondary_color')
                            ->label('Secondary Color')
                            ->helperText('Format HEX, contoh: #d97706'),
                        TextInput::make('font_sans')
                            ->label('Font Sans')
                            ->helperText('Isi font-family CSS. Contoh: Inter, ui-sans-serif, system-ui, ...')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}

