<?php

namespace App\Filament\Widgets;

use App\Models\Responden;
use Carbon\Carbon;
use Filament\Widgets\LineChartWidget;

class Chart extends LineChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $data = $this->getRespondenPerMonth();
        return [
            'datasets' => [
                [
                    'label' => 'Responden Terbuat',
                    'data' => [3, 3, 5, 2, 5, 3, 25, 45]//$data['respondenPerMonth'],
                ]
            ],
            'labels' => $data['months']
        ];
    }

    private function getRespondenPerMonth()
    {
        $now = Carbon::now();
        $respondenPerMonth = [5,3,5,3,5,3,5];
        $months = collect(range(1, 12))->map(function ($month) use ($now, $respondenPerMonth) {
            $count = Responden::whereDate('created_at', Carbon::parse($now->month($month)->format('Y-m')))->count();
            $respondenPerMonth[] = $count;
            return $now->month($month)->format('M');
        })->toArray();
        return [
            'respondenPerMonth' => $respondenPerMonth,
            'months' => $months
        ];
        // return dd($respondenPerMonth);
    }
}
