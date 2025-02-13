<?php

namespace App\Filament\Widgets;

use App\Models\Ad;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;

class LatestAds extends BaseWidget
{
    protected int $recordsPerPage = 5; // Limit the display to 5 ads
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(Ad::query()->latest()) // Fetch latest ads
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable(),

                TextColumn::make('category')
                    ->label('Category'),

                TextColumn::make('price')
                    ->label('Price')
                    ->money('USD'),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime(),
            ]);
    }
}

