<?php

namespace App\Filament\Resources\PpdbRegistrations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PpdbRegistrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Pendaftaran')
                    ->description('Informasi registrasi')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('registration_number')
                            ->label('Nomor Registrasi')
                            ->required()
                            ->disabled(),
                        Select::make('school_unit_id')
                            ->label('Unit Pendidikan')
                            ->relationship('schoolUnit', 'name')
                            ->required(),
                    ]),

                Section::make('Data Calon Siswa')
                    ->description('Informasi pribadi siswa')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('student_name')
                            ->label('Nama Lengkap Anak')
                            ->required(),
                        DatePicker::make('student_birth_date')
                            ->label('Tanggal Lahir')
                            ->required(),
                        Select::make('student_gender')
                            ->label('Jenis Kelamin')
                            ->options([
                                'Laki-laki' => 'Laki-laki',
                                'Perempuan' => 'Perempuan',
                            ]),
                        Textarea::make('student_address')
                            ->label('Alamat Siswa')
                            ->columnSpanFull(),
                    ]),

                Section::make('Data Orang Tua / Wali')
                    ->description('Informasi kontak orang tua')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextInput::make('parent_name')
                            ->label('Nama Orang Tua/Wali')
                            ->required(),
                        Select::make('parent_relationship')
                            ->label('Hubungan')
                            ->options([
                                'Ayah' => 'Ayah',
                                'Ibu' => 'Ibu',
                                'Wali' => 'Wali',
                            ]),
                        TextInput::make('parent_phone')
                            ->label('Nomor WhatsApp')
                            ->tel()
                            ->required(),
                        TextInput::make('parent_email')
                            ->label('Email')
                            ->email(),
                        Textarea::make('parent_address')
                            ->label('Alamat Domisili')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Section::make('Status & Pembayaran')
                    ->description('Proses dan pembayaran registrasi')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Menunggu Konfirmasi',
                                'confirmed' => 'Dikonfirmasi',
                                'accepted' => 'Diterima',
                                'rejected' => 'Ditolak',
                            ])
                            ->default('pending')
                            ->required(),
                        TextInput::make('registration_fee')
                            ->label('Biaya Registrasi (Rp)')
                            ->required()
                            ->numeric()
                            ->default(250000.0),
                        Toggle::make('fee_paid')
                            ->label('Biaya Sudah Dibayar')
                            ->required(),
                        DateTimePicker::make('confirmed_at')
                            ->label('Tanggal Konfirmasi'),
                    ]),

                Section::make('Catatan')
                    ->schema([
                        Textarea::make('notes')
                            ->label('Catatan Admin')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
