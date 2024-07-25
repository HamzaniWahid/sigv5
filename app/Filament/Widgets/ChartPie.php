<?php

namespace App\Filament\Widgets;

use Filament\Widgets\PieChartWidget;

class ChartPie extends PieChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        // $data = $this->getRespondenPerMonth();
        return [
            'datasets' => [
                [
                    'label' => 'Responden Terbuat',
                    'data' => [3, 3, 5, 2, 5, 3, 25, 45]//$data['respondenPerMonth'],
                ]
            ],
            'labels' => [4,3,6,4,3,5,2,5,3]//$data['months']
        ];
    }
}
