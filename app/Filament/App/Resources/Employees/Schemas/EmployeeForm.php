<?php

namespace App\Filament\App\Resources\Employees\Schemas;

use App\Models\City;
use App\Models\State;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Collection;

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
                    DatePicker::make('date_of_birth')->required()->native(false),
                    DatePicker::make('date_of_hire')->required()->native(false),
                ]),

                 Section::make('Location details')->schema([
                    Select::make('country_id')
                    ->name('Country')
                    ->required()
                    ->relationship(name:'country', titleAttribute:'name')
                    ->live()
                    ->searchable()
                    ->preload()
                    ->afterStateUpdated(function (Set $set){
                        $set('state_id', null);
                        $set('city_id', null);
                    }),

                    Select::make('state_id')
                    ->name('State')
                    ->required()
                    ->options(fn(Get $get): Collection => State::query()->where('country_id', $get('country_id'))->pluck('name','id'))
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(fn (Set $set)=> $set('city_id',null)),

                     Select::make('city_id')
                    ->name('City')

                    ->required()
                    ->options(fn(Get $get): Collection => City::query()->where('state_id', $get('state_id'))->pluck('name','id'))
                    ->searchable()
                    ->preload(),

                    Select::make('department_id')
                    ->name('Department')
                    ->required()
                    ->relationship(name:'department', titleAttribute:'name')
                    ->searchable()
                    ->preload(),

                ])->columnSpan('full')->columns(2),

            ]);
    }
}
