<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('stage_name'),
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
