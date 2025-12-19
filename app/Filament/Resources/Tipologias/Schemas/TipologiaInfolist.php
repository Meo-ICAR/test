<?php

namespace App\Filament\Resources\Tipologias\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TipologiaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->placeholder('-'),
                TextEntry::make('role')
                    ->placeholder('-'),
                TextEntry::make('icon')
                    ->placeholder('-'),
            ]);
    }
}
