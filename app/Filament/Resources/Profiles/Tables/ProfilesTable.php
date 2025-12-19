<?php

namespace App\Filament\Resources\Profiles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class ProfilesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
              SpatieMediaLibraryImageColumn::make('viso')
    ->collection('covers')
 //   ->responsiveImages()
    ->conversion('thumb') ,// Carica la versione da 200px nella lista, molto più veloce!
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('stage_name')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('birth_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('gender')
                    ->searchable(),
                TextColumn::make('city')
                    ->searchable(),
                TextColumn::make('country')
                    ->searchable(),
                TextColumn::make('province')
                    ->searchable(),
                TextColumn::make('height_cm')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('weight_kg')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_visible')
                    ->boolean(),
                TextColumn::make('scene_nudo')
                    ->badge(),
                IconColumn::make('consenso_privacy')
                    ->boolean(),
                IconColumn::make('is_represented')
                    ->boolean(),
                TextColumn::make('agency_name')
                    ->searchable(),
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
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
