<?php

namespace App\Filament\Resources\Tipologias;

use App\Filament\Resources\Tipologias\Pages\CreateTipologia;
use App\Filament\Resources\Tipologias\Pages\EditTipologia;
use App\Filament\Resources\Tipologias\Pages\ListTipologias;
use App\Filament\Resources\Tipologias\Pages\ViewTipologia;
use App\Filament\Resources\Tipologias\Schemas\TipologiaForm;
use App\Filament\Resources\Tipologias\Schemas\TipologiaInfolist;
use App\Filament\Resources\Tipologias\Tables\TipologiasTable;
use App\Models\Tipologia;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TipologiaResource extends Resource
{
    protected static ?string $model = Tipologia::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'tipologia';

    public static function form(Schema $schema): Schema
    {
        return TipologiaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TipologiaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TipologiasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTipologias::route('/'),
            'create' => CreateTipologia::route('/create'),
            'view' => ViewTipologia::route('/{record}'),
            'edit' => EditTipologia::route('/{record}/edit'),
        ];
    }
}
