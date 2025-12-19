<?php

namespace App\Filament\Resources\AnimalBreeds\Pages;

use App\Filament\Resources\AnimalBreeds\AnimalBreedResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAnimalBreed extends ViewRecord
{
    protected static string $resource = AnimalBreedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
