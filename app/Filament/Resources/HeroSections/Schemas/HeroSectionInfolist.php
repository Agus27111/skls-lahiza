<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class HeroSectionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('eyebrow_text')
                    ->label('Badge Atas'),
                TextEntry::make('title_prefix')
                    ->label('Judul Awal'),
                TextEntry::make('title_highlight')
                    ->label('Teks Highlight'),
                TextEntry::make('title_suffix')
                    ->label('Judul Baris Kedua'),
                TextEntry::make('description')
                    ->columnSpanFull(),
                TextEntry::make('primary_button_label')
                    ->label('Label Tombol Utama'),
                TextEntry::make('primary_button_url')
                    ->label('URL Tombol Utama'),
                TextEntry::make('secondary_button_label')
                    ->label('Label Tombol Sekunder'),
                TextEntry::make('secondary_button_url')
                    ->label('URL Tombol Sekunder'),
                TextEntry::make('image_path')
                    ->label('Path / URL Gambar')
                    ->columnSpanFull(),
                TextEntry::make('image_alt')
                    ->label('Alt Gambar')
                    ->placeholder('-'),
                TextEntry::make('floating_badge_label')
                    ->label('Label Badge Kecil')
                    ->placeholder('-'),
                TextEntry::make('floating_badge_text')
                    ->label('Isi Badge Kecil')
                    ->placeholder('-'),
                IconEntry::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
