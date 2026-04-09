<?php

namespace App\Filament\Resources\PpdbPaymentSettings\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PpdbPaymentSettingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('registration_fee')
                    ->label('Biaya Pendaftaran')
                    ->money('IDR'),
                TextEntry::make('bank_name')
                    ->label('Bank')
                    ->placeholder('-'),
                TextEntry::make('account_number')
                    ->label('Nomor Rekening')
                    ->placeholder('-'),
                TextEntry::make('account_holder_name')
                    ->label('Pemilik Rekening')
                    ->placeholder('-'),
                TextEntry::make('payment_notes')
                    ->label('Catatan Pembayaran')
                    ->placeholder('-')
                    ->columnSpanFull(),
                IconEntry::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ]);
    }
}
