<?php

namespace App\Filament\Resources\PpdbRegistrations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PpdbRegistrationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('registration_number')
                    ->searchable(),
                TextColumn::make('schoolUnit.name')
                    ->searchable(),
                TextColumn::make('student_name')
                    ->searchable(),
                TextColumn::make('student_birth_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('student_gender')
                    ->searchable(),
                TextColumn::make('parent_name')
                    ->searchable(),
                TextColumn::make('parent_phone')
                    ->searchable(),
                TextColumn::make('parent_email')
                    ->searchable(),
                TextColumn::make('parent_relationship')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('registration_fee')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('fee_paid')
                    ->boolean(),
                TextColumn::make('confirmed_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])->defaultSort('updated_at', 'desc');
    }
}
