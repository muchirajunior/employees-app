<?php

namespace App\Filament\Resources\Countries;

use App\Filament\Resources\Countries\Pages\CreateCountry;
use App\Filament\Resources\Countries\Pages\EditCountry;
use App\Filament\Resources\Countries\Pages\ListCountries;
use App\Filament\Resources\Countries\Pages\ViewCountry;
use App\Filament\Resources\Countries\RelationManagers\EmployeesRelationManager;
use App\Filament\Resources\Countries\RelationManagers\StatesRelationManager;
use App\Filament\Resources\Countries\Schemas\CountryForm;
use App\Filament\Resources\Countries\Tables\CountriesTable;
use App\Filament\Schemas\CountryView;
use App\Models\Country;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Override;
use UnitEnum;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFlag;

    protected static ?string $navigationLabel = 'My Countries';

    protected static ?string $modelLabel = 'Country';

    protected static  string | UnitEnum | null  $navigationGroup = "System Data";

    protected static ?int $navigationSort = 1;


    public static function form(Schema $schema): Schema
    {
        return CountryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CountriesTable::configure($table);
    }

    #[Override]
    public static function infolist(Schema $schema): Schema
    {
        return CountryView::configure($schema);
    }

    public static function getRelations(): array
    {
        return [
            StatesRelationManager::class,
            EmployeesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCountries::route('/'),
            'create' => CreateCountry::route('/create'),
            'edit' => EditCountry::route('/{record}/edit'),
            'view' => ViewCountry::route('/{record}'),
        ];
    }
}
