<?php

namespace App\Filament\Resources\SchoolUnits\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SchoolUnitsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('featured_programs_list')
                    ->label('Program Unggulan')
                    ->formatStateUsing(function (mixed $state): string {
                        if (blank($state)) {
                            return '-';
                        }

                        if (is_array($state)) {
                            return implode(' | ', $state);
                        }

                        $decodedState = json_decode($state, true);

                        if (json_last_error() === JSON_ERROR_NONE && is_array($decodedState)) {
                            return implode(' | ', $decodedState);
                        }

                        return (string) $state;
                    })
                    ->limit(60),
                TextColumn::make('max_quota')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->boolean(),
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
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
