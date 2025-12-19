<?php

namespace App\Filament\Resources\Tipologias\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TipologiaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                TextInput::make('role'),
                TextInput::make('icon'),
            ]);
    }
}
