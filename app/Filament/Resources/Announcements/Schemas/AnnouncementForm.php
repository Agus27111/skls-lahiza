<?php

namespace App\Filament\Resources\Announcements\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AnnouncementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pengumuman')
                    ->description('Data dasar pengumuman')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Pengumuman')
                            ->required()
                            ->columnSpanFull(),
                        Select::make('type')
                            ->label('Tipe Pengumuman')
                            ->required()
                            ->options([
                                'info' => 'Informasi',
                                'success' => 'Sukses',
                                'warning' => 'Peringatan',
                                'error' => 'Error',
                                'event' => 'Event',
                            ])
                            ->default('info'),
                        Select::make('school_unit_id')
                            ->label('Unit Pendidikan (Opsional)')
                            ->relationship('schoolUnit', 'name'),
                    ]),

                Section::make('Konten')
                    ->description('Isi pengumuman')
                    ->collapsible()
                    ->schema([
                        RichEditor::make('content')
                            ->label('Isi Pengumuman')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('icon')
                            ->label('Ikon Lucide (Opsional)')
                            ->helperText('Contoh: bell-ring, calendar, check-circle'),
                    ]),

                Section::make('Status & Publikasi')
                    ->description('Atur visibilitas dan jadwal')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->required(),
                        Toggle::make('is_featured')
                            ->label('Tampilkan Sebagai Unggulan')
                            ->required(),
                        DateTimePicker::make('published_at')
                            ->label('Tanggal Publikasi'),
                        DateTimePicker::make('archived_at')
                            ->label('Tanggal Arsip'),
                    ]),
            ]);
    }
}
