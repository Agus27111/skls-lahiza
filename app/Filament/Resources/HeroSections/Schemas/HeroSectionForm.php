<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use App\Models\HeroSection;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Teks Hero')
                    ->description('Konten utama yang tampil di bagian atas beranda')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('eyebrow_text')
                            ->label('Badge Atas')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        TextInput::make('title_prefix')
                            ->label('Judul Awal')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('title_highlight')
                            ->label('Teks Highlight')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('title_suffix')
                            ->label('Judul Baris Kedua')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
                Section::make('Tombol CTA')
                    ->description('Tombol ajakan utama di hero section')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('primary_button_label')
                            ->label('Label Tombol Utama')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('primary_button_url')
                            ->label('URL Tombol Utama')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('secondary_button_label')
                            ->label('Label Tombol Sekunder')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('secondary_button_url')
                            ->label('URL Tombol Sekunder')
                            ->required()
                            ->maxLength(255),
                    ]),
                Section::make('Media Hero')
                    ->description('Gambar utama dan badge kecil di sisi kanan')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        FileUpload::make('image_path')
                            ->label('Gambar Hero')
                            ->image()
                            ->disk('public')
                            ->directory('hero-sections')
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->dehydrated(fn ($state): bool => filled($state))
                            ->imageEditor()
                            ->helperText('Upload gambar hero. File akan disimpan di storage publik.')
                            ->columnSpanFull(),

                        TextInput::make('image_alt')
                            ->label('Alt Gambar')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        TextInput::make('floating_badge_label')
                            ->label('Label Badge Kecil')
                            ->maxLength(255),
                        TextInput::make('floating_badge_text')
                            ->label('Isi Badge Kecil')
                            ->maxLength(255),
                    ]),
                Section::make('Status')
                    ->description('Atur hero aktif dan status tampilnya fitur PPDB di beranda')
                    ->collapsible()
                    ->schema([
                        Toggle::make('is_ppdb_active')
                            ->label('PPDB Aktif')
                            ->helperText('Jika dimatikan, section pendaftaran dan tombol PPDB tidak akan tampil.')
                            ->required(),
                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->required(),
                    ]),
            ]);
    }
}
