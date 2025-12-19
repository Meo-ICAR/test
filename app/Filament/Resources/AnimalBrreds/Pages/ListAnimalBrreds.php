<?php

namespace App\Filament\Resources\AnimalBrreds\Pages;

use App\Filament\Resources\AnimalBrreds\AnimalBrredResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAnimalBrreds extends ListRecords
{
    protected static string $resource = AnimalBrredResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
