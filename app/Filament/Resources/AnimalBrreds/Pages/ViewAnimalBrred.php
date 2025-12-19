<?php

namespace App\Filament\Resources\AnimalBrreds\Pages;

use App\Filament\Resources\AnimalBrreds\AnimalBrredResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAnimalBrred extends ViewRecord
{
    protected static string $resource = AnimalBrredResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
