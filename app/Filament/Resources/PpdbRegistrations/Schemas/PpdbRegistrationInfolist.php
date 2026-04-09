<?php

namespace App\Filament\Resources\PpdbRegistrations\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

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
                TextEntry::make('family_card_path')
                    ->label('File KK')
                    ->formatStateUsing(fn (?string $state): string => $state ? 'Lihat dokumen' : '-')
                    ->url(fn ($record): ?string => $record->family_card_path ? Storage::disk('public')->url($record->family_card_path) : null)
                    ->openUrlInNewTab(),
                TextEntry::make('father_id_card_path')
                    ->label('File KTP Ayah')
                    ->formatStateUsing(fn (?string $state): string => $state ? 'Lihat dokumen' : '-')
                    ->url(fn ($record): ?string => $record->father_id_card_path ? Storage::disk('public')->url($record->father_id_card_path) : null)
                    ->openUrlInNewTab(),
                TextEntry::make('mother_id_card_path')
                    ->label('File KTP Ibu')
                    ->formatStateUsing(fn (?string $state): string => $state ? 'Lihat dokumen' : '-')
                    ->url(fn ($record): ?string => $record->mother_id_card_path ? Storage::disk('public')->url($record->mother_id_card_path) : null)
                    ->openUrlInNewTab(),
                TextEntry::make('birth_certificate_path')
                    ->label('File Akte Lahir')
                    ->formatStateUsing(fn (?string $state): string => $state ? 'Lihat dokumen' : '-')
                    ->url(fn ($record): ?string => $record->birth_certificate_path ? Storage::disk('public')->url($record->birth_certificate_path) : null)
                    ->openUrlInNewTab(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('registration_fee')
                    ->money('IDR'),
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
