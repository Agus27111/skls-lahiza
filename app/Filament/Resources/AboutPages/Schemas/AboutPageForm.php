<?php

namespace App\Filament\Resources\AboutPages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AboutPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero')
                    ->description('Bagian pembuka halaman Tentang Kami')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('eyebrow_text')
                            ->label('Badge Atas')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('hero_title')
                            ->label('Judul Hero')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('hero_description')
                            ->label('Deskripsi Hero')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
                Section::make('Sejarah')
                    ->description('Bagian sejarah dan gambar utama')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('history_title')
                            ->label('Judul Sejarah')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Repeater::make('history_paragraphs')
                            ->label('Paragraf Sejarah')
                            ->schema([
                                Textarea::make('text')
                                    ->label('Paragraf')
                                    ->required()
                                    ->rows(3),
                            ])
                            ->defaultItems(2)
                            ->minItems(1)
                            ->reorderable(false)
                            ->addActionLabel('Tambah Paragraf')
                            ->columnSpan(1)
                            ->dehydrateStateUsing(fn (?array $state): array => collect($state)
                                ->pluck('text')
                                ->filter()
                                ->values()
                                ->all())
                            ->formatStateUsing(fn ($state): array => collect($state)
                                ->map(fn ($item) => ['text' => $item])
                                ->values()
                                ->all()),
                        Section::make('Gambar Sejarah')
                            ->schema([
                                FileUpload::make('history_image_path')
                                    ->label('Gambar Sejarah')
                                    ->image()
                                    ->disk('public')
                                    ->directory('about-pages')
                                    ->imageEditor()
                                    ->helperText('Boleh upload gambar baru. URL lama eksternal akan tetap tersimpan jika tidak diubah.'),
                                TextInput::make('history_image_alt')
                                    ->label('Alt Gambar Sejarah')
                                    ->maxLength(255),
                            ]),
                    ]),
                Section::make('Visi, Misi, Tujuan')
                    ->columns(3)
                    ->collapsible()
                    ->schema([
                        Textarea::make('vision_text')
                            ->label('Visi')
                            ->required()
                            ->rows(5),
                        Textarea::make('mission_text')
                            ->label('Misi')
                            ->required()
                            ->rows(5),
                        Textarea::make('goal_text')
                            ->label('Tujuan')
                            ->required()
                            ->rows(5),
                    ]),
                Section::make('Nilai Inti')
                    ->description('Daftar kartu nilai utama sekolah')
                    ->collapsible()
                    ->schema([
                        TextInput::make('core_values_heading')
                            ->label('Judul Section')
                            ->required()
                            ->maxLength(255),
                        Repeater::make('core_values')
                            ->label('Nilai Inti')
                            ->schema([
                                TextInput::make('icon')
                                    ->label('Ikon Lucide')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('title')
                                    ->label('Judul')
                                    ->required()
                                    ->maxLength(255),
                                Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->required()
                                    ->rows(2)
                                    ->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->defaultItems(4)
                            ->minItems(1)
                            ->addActionLabel('Tambah Nilai'),
                    ]),
                Section::make('Unit Pendidikan')
                    ->description('Teks pengantar sebelum daftar unit sekolah dinamis')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('school_units_heading')
                            ->label('Judul Section')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('school_units_description')
                            ->label('Deskripsi Section')
                            ->rows(3),
                    ]),
                Section::make('Guru & Fasilitator')
                    ->description('Teks pengantar sebelum daftar guru dinamis')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('teachers_heading')
                            ->label('Judul Section')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('teachers_description')
                            ->label('Deskripsi Section')
                            ->rows(3),
                    ]),
                Section::make('Fasilitas')
                    ->description('Daftar fasilitas dan gambar pendukung')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('facilities_title')
                            ->label('Judul Fasilitas')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Repeater::make('facilities')
                            ->label('Daftar Fasilitas')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Nama Fasilitas')
                                    ->required()
                                    ->maxLength(255),
                                Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->required()
                                    ->rows(2),
                            ])
                            ->defaultItems(4)
                            ->minItems(1)
                            ->addActionLabel('Tambah Fasilitas'),
                        Section::make('Gambar Fasilitas')
                            ->schema([
                                FileUpload::make('facilities_image_path')
                                    ->label('Gambar Fasilitas')
                                    ->image()
                                    ->disk('public')
                                    ->directory('about-pages')
                                    ->imageEditor()
                                    ->helperText('Boleh upload gambar baru.'),
                                TextInput::make('facilities_image_alt')
                                    ->label('Alt Gambar Fasilitas')
                                    ->maxLength(255),
                            ]),
                    ]),
                Section::make('Program Unggulan')
                    ->collapsible()
                    ->schema([
                        TextInput::make('programs_title')
                            ->label('Judul Program')
                            ->required()
                            ->maxLength(255),
                        Repeater::make('programs')
                            ->label('Daftar Program')
                            ->schema([
                                TextInput::make('icon')
                                    ->label('Ikon Lucide')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('title')
                                    ->label('Judul')
                                    ->required()
                                    ->maxLength(255),
                                Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->required()
                                    ->rows(2)
                                    ->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->defaultItems(3)
                            ->minItems(1)
                            ->addActionLabel('Tambah Program'),
                    ]),
                Section::make('CTA')
                    ->description('Ajakan di bagian paling bawah halaman')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('cta_title')
                            ->label('Judul CTA')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('cta_description')
                            ->label('Deskripsi CTA')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                        TextInput::make('cta_primary_label')
                            ->label('Label Tombol Utama')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('cta_primary_url')
                            ->label('URL Tombol Utama')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('cta_secondary_label')
                            ->label('Label Tombol Sekunder')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('cta_secondary_url')
                            ->label('URL Tombol Sekunder')
                            ->required()
                            ->maxLength(255),
                    ]),
                Section::make('Status')
                    ->collapsible()
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->required(),
                    ]),
            ]);
    }
}
