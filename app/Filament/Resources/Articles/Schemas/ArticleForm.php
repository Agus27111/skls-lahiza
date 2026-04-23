<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Dasar')
                    ->description('Judul dan metadata artikel')
                    ->collapsible()
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Artikel')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->required(),
                        Select::make('category')
                            ->label('Kategori')
                            ->required()
                            ->options([
                                'Edukasi' => 'Edukasi',
                                'Adab' => 'Adab',
                                'Parenting' => 'Parenting',
                                'Tips' => 'Tips',
                                'Nurture' => 'Nurture',
                            ]),
                    ])->columnSpanFull(),
                Section::make('Konten')
                    ->description('Isi artikel dan gambar')
                    ->collapsible()
                    ->schema([
                        Textarea::make('excerpt')
                            ->label('Ringkasan Artikel')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull()
                            ->hint('Ditampilkan di listing artikel'),
                        RichEditor::make('content')
                            ->label('Konten Artikel')
                            ->required()
                            ->columnSpanFull(),
                        FileUpload::make('image')
                            ->label('Gambar Sampul')
                            ->image()
                            ->disk('public')
                            ->directory('articles')
                            ->columnSpanFull(),
                    ])->columnSpanFull(),
                Section::make('Penulis & Publikasi')
                    ->description('Informasi penulis dan status publikasi')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        Select::make('teacher_id')
                            ->label('Penulis/Author')
                            ->relationship('teacher', 'name'),
                        Toggle::make('published')
                            ->label('Dipublikasikan')
                            ->required(),
                        DateTimePicker::make('published_at')
                            ->label('Tanggal Publikasi')
                            ->columnSpanFull(),
                    ]),

                Section::make('Statistik')
                    ->description('Jumlah views artikel')
                    ->schema([
                        TextInput::make('views')
                            ->label('Jumlah Views')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->disabled(),
                    ]),
            ]);
    }
}
