<?php

namespace App\Filament\Resources\SchoolUnits\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SchoolUnitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Unit')
                    ->description('Data dasar unit pendidikan')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Unit')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Section::make('Deskripsi & Filosofi')
                    ->description('Penjelasan tentang unit')
                    ->collapsible()
                    ->schema([
                        Textarea::make('description')
                            ->label('Deskripsi Unit')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        Textarea::make('philosophy')
                            ->label('Filosofi Pendidikan')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
                Section::make('Pengaturan')
                    ->description('Konfigurasi unit')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('max_quota')
                            ->label('Kuota Maksimal Siswa')
                            ->required()
                            ->numeric()
                            ->default(20),
                        Toggle::make('is_active')
                            ->label('Unit Aktif')
                            ->required(),
                    ]),
            ]);
    }
}
