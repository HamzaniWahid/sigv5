<?php

namespace App\Filament\Widgets;

use App\Models\Jawaban;
use App\Models\Kuisioner;
use App\Models\Sekolah;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Jumlah Sekolah', Sekolah::all()->count())
            ->description('32k increase')
            ->descriptionIcon('heroicon-s-trending-up')
            ->color('success')
            ->chart([50,60,70,80,30,70,27,30]),
            Card::make('Jumlah Kuisioner', Kuisioner::count())
            ->description('32k increase')
            ->descriptionIcon('heroicon-s-trending-up')
            ->color('success')
            ->chart([50,60,70,80,30,70,27,30]),
            Card::make('Jumlah Jawaban', Jawaban::count())
            ->description('32k increase')
            ->descriptionIcon('heroicon-s-trending-up')
            ->color('success')
            ->chart([50,60,70,80,30,70,27,30]),
        ];
    }
}
