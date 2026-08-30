<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestAdminEmployees extends TableWidget
{
    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = 'full';


    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Employee::query())
            ->defaultSort('created_at','asc')
            ->columns([
                TextColumn::make('first_name')
                    ->searchable(),
                TextColumn::make('last_name')
                    ->searchable(),
                TextColumn::make('middle_name')
                    ->searchable(),
                TextColumn::make('address')
                    ->searchable(),
                TextColumn::make('zip_code')
                    ->searchable(),
                TextColumn::make('date_of_birth')
                    ->date()
              
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
