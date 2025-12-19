<?php

namespace App\Filament\Resources\Tipologias\Pages;

use App\Filament\Resources\Tipologias\TipologiaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTipologia extends ViewRecord
{
    protected static string $resource = TipologiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
