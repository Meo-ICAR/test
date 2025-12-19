<?php

namespace App\Filament\Resources\AnimalSpecies;

use App\Filament\Resources\AnimalSpecies\Pages\CreateAnimalSpecie;
use App\Filament\Resources\AnimalSpecies\Pages\EditAnimalSpecie;
use App\Filament\Resources\AnimalSpecies\Pages\ListAnimalSpecies;
use App\Filament\Resources\AnimalSpecies\Pages\ViewAnimalSpecie;
use App\Filament\Resources\AnimalSpecies\Schemas\AnimalSpecieForm;
use App\Filament\Resources\AnimalSpecies\Schemas\AnimalSpecieInfolist;
use App\Filament\Resources\AnimalSpecies\Tables\AnimalSpeciesTable;
use App\Models\AnimalSpecie;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnimalSpecieResource extends Resource
{
    protected static ?string $model = AnimalSpecie::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return AnimalSpecieForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AnimalSpecieInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AnimalSpeciesTable::configure($table);
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
            'index' => ListAnimalSpecies::route('/'),
            'create' => CreateAnimalSpecie::route('/create'),
            'view' => ViewAnimalSpecie::route('/{record}'),
            'edit' => EditAnimalSpecie::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
