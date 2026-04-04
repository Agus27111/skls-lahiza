<?php

namespace App\Filament\Resources\PpdbRegistrations\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PpdbRegistrationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('registration_number'),
                TextEntry::make('schoolUnit.name')
                    ->label('School unit'),
                TextEntry::make('student_name'),
                TextEntry::make('student_birth_date')
                    ->date(),
                TextEntry::make('student_gender')
                    ->placeholder('-'),
                TextEntry::make('student_address')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('parent_name'),
                TextEntry::make('parent_phone'),
                TextEntry::make('parent_email')
                    ->placeholder('-'),
                TextEntry::make('parent_address')
                    ->columnSpanFull(),
                TextEntry::make('parent_relationship')
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('registration_fee')
                    ->numeric(),
                IconEntry::make('fee_paid')
                    ->boolean(),
                TextEntry::make('notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('confirmed_at')
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
