<?php

namespace App\Filament\Resources\RespondenResource\Widgets;

use Filament\Widgets\LineChartWidget;

class ChartPie extends LineChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }
}
