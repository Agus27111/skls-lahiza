<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pribadi')
                    ->description('Data dasar guru/murobbi')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->columnSpanFull(),
                        TextInput::make('phone')
                            ->label('Nomor Telepon')
                            ->tel(),
                    ]),

                Section::make('Posisi & Jabatan')
                    ->description('Informasi posisi di sekolah')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        Textarea::make('title')
                            ->label('Gelar/Sertifikasi')
                            ->required()
                            ->rows(2)
                            ->columnSpanFull(),
                        Textarea::make('position')
                            ->label('Posisi/Jabatan')
                            ->required()
                            ->rows(2)
                            ->columnSpanFull(),
                        Select::make('school_unit_id')
                            ->label('Unit Pendidikan')
                            ->relationship('schoolUnit', 'name'),
                    ]),

                Section::make('Biodata')
                    ->description('Biografi dan informasi tambahan')
                    ->collapsible()
                    ->schema([
                        Textarea::make('bio')
                            ->label('Biografi')
                            ->rows(4)
                            ->columnSpanFull(),
                        FileUpload::make('image')
                            ->label('Foto Profil')
                            ->image()
                            ->disk('public')
                            ->directory('teachers')
                            ->columnSpanFull(),
                    ]),

                Section::make('Status')
                    ->columns(1)
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Guru Aktif')
                            ->required(),
                    ]),
            ]);
    }
}
