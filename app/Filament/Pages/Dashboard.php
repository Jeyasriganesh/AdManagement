<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\LatestAds;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array // Change protected to public
    {
        return [
            StatsOverview::class,
            LatestAds::class,
        ];
    }
}

