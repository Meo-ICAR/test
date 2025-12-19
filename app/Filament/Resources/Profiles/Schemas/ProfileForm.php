<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class ProfileForm
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
              TextInput::make('stage_name'),
           TextInput::make('phone')
                    ->tel(),

                TextInput::make('slug'),
                DatePicker::make('birth_date'),
                TextInput::make('gender'),
                TextInput::make('city'),
                TextInput::make('country')
                    ->default('IT'),
                TextInput::make('province'),
                TextInput::make('height_cm')
                    ->numeric(),
                TextInput::make('weight_kg')
                    ->numeric(),
                TextInput::make('appearance'),
                TextInput::make('measurements'),
                TextInput::make('capabilities'),
                TextInput::make('socials'),
                Toggle::make('is_visible'),
                Select::make('scene_nudo')
                    ->options(['no' => 'No', 'parziale' => 'Parziale', 'si' => 'Si'])
                    ->default('no'),
                Toggle::make('consenso_privacy'),
                Toggle::make('is_represented'),
                TextInput::make('agency_name'),
            ]);
    }
}
