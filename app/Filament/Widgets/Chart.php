<?php

namespace App\Filament\Widgets;

use App\Models\Jawaban;
use App\Models\Responden;
use App\Models\Sekolah;
use App\Models\Hasil;
use Carbon\Carbon;
use Filament\Widgets\LineChartWidget;

class Chart extends LineChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $data = Jawaban::
        with('hasil.responden.sekolah')->
        where('jawaban', 'Ya')
        // where('jawaban', 'Ya')
        // where('sekolah_id', 2)
        // pluck('responden.nama')
        // ->where()
        ->count();
        //           ->where('jawaban_id', 15)->count();
        // $iya = Hasil::with('responden.sekolah', 'jawaban')->get();
        // $sek = Responden::with('sekolah', 'hasil')->get();
        $sek = Sekolah::all();
        $oh = [];
        foreach ($sek as $key) {
           $oh[] = $data;
        }
        dd($oh);
        return [
            'datasets' => [
                [
                    'label' => 'Asal sekolah yang Minat Melanjutkan Studi',
                    'data' => $iya->pluck('jawaban.id'),
                    // 'data' => $iya->pluck('responden.sekolah.nama'),
                ]//tampilkan total siapa responden yg jawab minat di kuisioner
            ],
            // 'labels' => Sekolah::all()->pluck('nama')
            'labels' => $iya->pluck('jawaban.id')//tau dia dari sekolah mana
        ];
    }
}
