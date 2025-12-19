<?php

namespace App\Filament\Resources\AnimalBrreds;

use App\Filament\Resources\AnimalBrreds\Pages\CreateAnimalBrred;
use App\Filament\Resources\AnimalBrreds\Pages\EditAnimalBrred;
use App\Filament\Resources\AnimalBrreds\Pages\ListAnimalBrreds;
use App\Filament\Resources\AnimalBrreds\Pages\ViewAnimalBrred;
use App\Filament\Resources\AnimalBrreds\Schemas\AnimalBrredForm;
use App\Filament\Resources\AnimalBrreds\Schemas\AnimalBrredInfolist;
use App\Filament\Resources\AnimalBrreds\Tables\AnimalBrredsTable;
use App\Models\AnimalBrred;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AnimalBrredResource extends Resource
{
    protected static ?string $model = AnimalBrred::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AnimalBrredForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AnimalBrredInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AnimalBrredsTable::configure($table);
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
            'index' => ListAnimalBrreds::route('/'),
            'create' => CreateAnimalBrred::route('/create'),
            'view' => ViewAnimalBrred::route('/{record}'),
            'edit' => EditAnimalBrred::route('/{record}/edit'),
        ];
    }
}
