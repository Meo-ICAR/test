<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class ProfileInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
              SpatieMediaLibraryFileUpload::make('face')
   ->collection('covers') // Nome della collezione Spatie
                ->image()  ,           // Valida come immagine
               // ->conversion('thumb') // Usa una conversione specifica (opzionale)
//                ->responsiveImages()  // Attiva immagini responsive (opzionale)
           //     ->multiple(),         // Se vuoi permettere più caricamenti

                TextEntry::make('phone')
                    ->placeholder('-'),
                TextEntry::make('stage_name')
                    ->placeholder('-'),
                TextEntry::make('slug')
                    ->placeholder('-'),
                TextEntry::make('birth_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('gender')
                    ->placeholder('-'),
                TextEntry::make('city')
                    ->placeholder('-'),
                TextEntry::make('country')
                    ->placeholder('-'),
                TextEntry::make('province')
                    ->placeholder('-'),
                TextEntry::make('height_cm')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('weight_kg')
                    ->numeric()
                    ->placeholder('-'),
                IconEntry::make('is_visible')
                    ->boolean()
                    ->placeholder('-'),
                TextEntry::make('scene_nudo')
                    ->badge()
                    ->placeholder('-'),
                IconEntry::make('consenso_privacy')
                    ->boolean()
                    ->placeholder('-'),
                IconEntry::make('is_represented')
                    ->boolean()
                    ->placeholder('-'),
                TextEntry::make('agency_name')
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
