<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('middle_name')
                    ->required(),
                TextInput::make('address')
                    ->required(),
                TextInput::make('zip_code')
                    ->required(),
                DatePicker::make('date_of_birth')
                    ->required(),
                DatePicker::make('date_of_hire')
                    ->required(),
                TextInput::make('country_id')
                    ->required()
                    ->numeric(),
                TextInput::make('state_id')
                    ->required()
                    ->numeric(),
                TextInput::make('city_id')
                    ->required()
                    ->numeric(),
                TextInput::make('department_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
