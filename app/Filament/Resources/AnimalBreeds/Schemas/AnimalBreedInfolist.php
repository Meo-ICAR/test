<?php

namespace App\Filament\Resources\AnimalBreeds\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AnimalBreedInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('species.name')
                    ->label('Species'),
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('category_group')
                    ->placeholder('-'),
                TextEntry::make('standard_description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
