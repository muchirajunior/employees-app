<?php

namespace App\Filament\Resources\States;

use App\Filament\Resources\States\Pages\CreateState;
use App\Filament\Resources\States\Pages\EditState;
use App\Filament\Resources\States\Pages\ListStates;
use App\Filament\Resources\States\RelationManagers\CitiesRelationManager;
use App\Filament\Resources\States\Schemas\StateForm;
use App\Filament\Resources\States\Tables\StatesTable;
use App\Filament\Resources\Users\Schemas\UserInfolist;
use App\Models\State;
use BackedEnum;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Override;
use UnitEnum;

class StateResource extends Resource
{
    protected static ?string $model = State::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::GlobeEuropeAfrica;

    protected static ?string $recordTitleAttribute = 'State';

    protected static  string | UnitEnum | null  $navigationGroup = "System Data";

    protected static ?int $navigationSort = 2;


    public static function form(Schema $schema): Schema
    {
        return StateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StatesTable::configure($table);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
                Section::make([
                    TextEntry::make('name')->label('State name'),
                    TextEntry::make('country.name')->label('Country')
                ])->label('State Information')
               

            ]);
    }

    public static function getRelations(): array
    {
        return [
            CitiesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStates::route('/'),
            'create' => CreateState::route('/create'),
            'edit' => EditState::route('/{record}/edit'),
        ];
    }
}
