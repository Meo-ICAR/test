<?php

namespace App\Filament\Resources\Species;

use App\Filament\Resources\Species\Pages\CreateSpecie;
use App\Filament\Resources\Species\Pages\EditSpecie;
use App\Filament\Resources\Species\Pages\ListSpecies;
use App\Filament\Resources\Species\Pages\ViewSpecie;
use App\Filament\Resources\Species\Schemas\SpecieForm;
use App\Filament\Resources\Species\Schemas\SpecieInfolist;
use App\Filament\Resources\Species\Tables\SpeciesTable;
use App\Models\Specie;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class   SpecieResource extends Resource
{
    protected static ?string $model = Specie::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return SpecieForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SpecieInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SpeciesTable::configure($table);
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
            'index' => ListSpecies::route('/'),
            'create' => CreateSpecie::route('/create'),
            'view' => ViewSpecie::route('/{record}'),
            'edit' => EditSpecie::route('/{record}/edit'),
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
