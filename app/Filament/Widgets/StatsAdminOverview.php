<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use App\Models\Team;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
        Stat::make('Users', User::all()->count())
            ->description('All users from store')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success')
            ->chart([7, 2, 10, 3, 15, 4, 17]),
        Stat::make('Teams', Team::all()->count())
            ->description('All teams from store')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('danger')
            ->chart([7, 2, 10, 3, 4, 1]),
        Stat::make('Employees', Employee::all()->count())
            ->description('All Employees from store')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        ];
    }
}
