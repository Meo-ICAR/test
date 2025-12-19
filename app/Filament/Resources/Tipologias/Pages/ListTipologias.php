<?php

namespace App\Filament\Resources\Tipologias\Pages;

use App\Filament\Resources\Tipologias\TipologiaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTipologias extends ListRecords
{
    protected static string $resource = TipologiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
