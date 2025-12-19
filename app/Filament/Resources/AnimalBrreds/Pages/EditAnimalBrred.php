<?php

namespace App\Filament\Resources\AnimalBrreds\Pages;

use App\Filament\Resources\AnimalBrreds\AnimalBrredResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAnimalBrred extends EditRecord
{
    protected static string $resource = AnimalBrredResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
