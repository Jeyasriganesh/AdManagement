<?php

namespace App\Filament\Widgets;

use App\Models\Ad;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 2;
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('Total registered users')
                ->icon('heroicon-o-user'),

            Stat::make('Total Ads', Ad::count())
                ->description('Total advertisements')
                ->icon('heroicon-o-square-3-stack-3d'),

            Stat::make('Active Ads', Ad::where('status', 'active')->count())
                ->description('Currently active ads')
                ->icon('heroicon-o-check-circle'),
        ];
    }
}

