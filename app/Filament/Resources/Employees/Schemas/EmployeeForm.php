<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Name')->description('Names details')->schema([
                    TextInput::make('first_name')->required()->maxLength(255),
                    TextInput::make('last_name')->required()->maxLength(255),
                    TextInput::make('middle_name')->required()->maxLength(255),
                ])->columnSpan('full')->columns(2),

                Section::make('Address')->schema([
                    TextInput::make('address')->required(),
                    TextInput::make('zip_code')->required(),
                ]),

                Section::make('Dates')->schema([
                    DatePicker::make('date_of_birth')->required(),
                    DatePicker::make('date_of_hire')->required(),
                ]),

                 Section::make('Name')->description('Names details')->schema([
                     Select::make('Country')
                    ->required()
                    ->relationship(name:'country', titleAttribute:'name')
                    ->searchable()
                    ->preload(),

                     Select::make('state')
                    ->required()
                    ->relationship(name:'state', titleAttribute:'name')
                    ->searchable()
                    ->preload(),

                     Select::make('city')
                    ->required()
                    ->relationship(name:'city', titleAttribute:'name')
                    ->searchable()
                    ->preload(),

                    Select::make('department')
                    ->required()
                    ->relationship(name:'department', titleAttribute:'name')
                    ->searchable()
                    ->preload(),

                ])->columnSpan('full')->columns(2),

                // TextInput::make('country_id')
                //     ->required()
                //     ->numeric(),
                // TextInput::make('state_id')
                //     ->required()
                //     ->numeric(),
                // TextInput::make('city_id')
                //     ->required()
                //     ->numeric(),
                // TextInput::make('department_id')
                //     ->required()
                //     ->numeric(),
            ]);
    }
}
