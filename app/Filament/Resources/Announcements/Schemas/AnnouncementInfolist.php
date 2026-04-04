<?php

namespace App\Filament\Resources\Announcements\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AnnouncementInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('content')
                    ->columnSpanFull(),
                TextEntry::make('type'),
                TextEntry::make('icon')
                    ->placeholder('-'),
                IconEntry::make('is_active')
                    ->boolean(),
                IconEntry::make('is_featured')
                    ->boolean(),
                TextEntry::make('schoolUnit.name')
                    ->label('School unit')
                    ->placeholder('-'),
                TextEntry::make('published_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('archived_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
