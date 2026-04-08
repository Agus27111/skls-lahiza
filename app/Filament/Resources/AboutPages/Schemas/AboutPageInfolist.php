<?php

namespace App\Filament\Resources\AboutPages\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AboutPageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('eyebrow_text')
                    ->label('Badge Atas'),
                TextEntry::make('hero_title')
                    ->label('Judul Hero'),
                TextEntry::make('hero_description')
                    ->label('Deskripsi Hero')
                    ->columnSpanFull(),
                TextEntry::make('history_title')
                    ->label('Judul Sejarah'),
                TextEntry::make('vision_text')
                    ->label('Visi')
                    ->columnSpanFull(),
                TextEntry::make('mission_text')
                    ->label('Misi')
                    ->columnSpanFull(),
                TextEntry::make('goal_text')
                    ->label('Tujuan')
                    ->columnSpanFull(),
                ImageEntry::make('history_image_url')
                    ->label('Gambar Sejarah')
                    ->placeholder('-'),
                ImageEntry::make('facilities_image_url')
                    ->label('Gambar Fasilitas')
                    ->placeholder('-'),
                IconEntry::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->label('Terakhir Diubah'),
            ]);
    }
}
