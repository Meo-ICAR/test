<?php

namespace App\Filament\Resources\AnimalSpecies\Pages;

use App\Filament\Resources\AnimalSpecies\AnimalSpecieResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAnimalSpecie extends ViewRecord
{
    protected static string $resource = AnimalSpecieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
