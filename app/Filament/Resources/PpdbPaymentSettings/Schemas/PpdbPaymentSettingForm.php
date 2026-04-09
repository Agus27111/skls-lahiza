<?php

namespace App\Filament\Resources\PpdbPaymentSettings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PpdbPaymentSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Biaya Pendaftaran')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('registration_fee')
                            ->label('Biaya Pendaftaran (Rp)')
                            ->required()
                            ->numeric()
                            ->default(250000)
                            ->columnSpanFull(),
                    ]),
                Section::make('Informasi Transfer')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('bank_name')
                            ->label('Nama Bank')
                            ->maxLength(255),
                        TextInput::make('account_number')
                            ->label('Nomor Rekening')
                            ->maxLength(255),
                        TextInput::make('account_holder_name')
                            ->label('Nama Pemilik Rekening')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('payment_notes')
                            ->label('Catatan Pembayaran')
                            ->rows(3)
                            ->columnSpanFull(),
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
