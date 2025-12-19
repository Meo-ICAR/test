<?php

namespace App\Filament\Resources\Tipologias\Pages;

use App\Filament\Resources\Tipologias\TipologiaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTipologia extends EditRecord
{
    protected static string $resource = TipologiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
