<?php

namespace App\Filament\Resources\Cities\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('State')
                    ->required()
                    ->relationship(name:'state', titleAttribute:'name')
                    ->searchable()
                    ->preload(),
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
