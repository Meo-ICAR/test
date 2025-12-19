<?php

namespace App\Filament\Resources\Species\Pages;

use App\Filament\Resources\Species\SpecieResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSpecie extends ViewRecord
{
    protected static string $resource = SpecieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
