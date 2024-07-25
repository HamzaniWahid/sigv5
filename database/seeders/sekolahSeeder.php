<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sekolahSeeder extends Seeder
{
    public function run()
    {
        $sekolahs = [
            [
                'nama' => 'SMAN 1 Kayangan',
                'alamat' => 'Jl. Pendidikan Kayangan',
                'lokasi_latlng' => '-8.25607999413258, 116.26098974226903',
                'web' => 'https://sekolahloka.com/data/sman-1-kayangan/',
                
            ],
            [
                'nama' => 'SMAN 1 Gangga',
                'alamat' => 'Jl. Raya Gondang',
                'lokasi_latlng' => '-8.33024003992405, 116.19164020555557',
                'web' => 'https://sekolahloka.com/data/sman-1-gangga/',
                
            ],
            [
                'nama' => 'SMAN 1 TANJUNG',
                'alamat' => 'Jl. Raya Tanjung No. 17',
                'lokasi_latlng' => '-8.35852770081168, 116.1477689417205',
                'web' => 'https://sekolahloka.com/data/sman-1-tanjung-3/',
                
            ],
            [
                'nama' => 'SMAN 2 TANJUNG',
                'alamat' => 'Lendang Galuh',
                'lokasi_latlng' => '-8.35642981950222, 116.1617148403162',
                'web' => 'https://sekolahloka.com/data/sman-2-tanjung-2/',
                
            ],
            [
                'nama' => 'SMA Sifaunnufus',
                'alamat' => 'Sambik Elen',
                'lokasi_latlng' => '-',
                'web' => 'https://sekolahloka.com/data/smas-sifaunnufus/',
                
            ],
            [
                'nama' => 'SMA Ittihadul Falah',
                'alamat' => 'Dusun Pendua Lauk',
                'lokasi_latlng' => '-8.300594269476235, 116.26432523941843',
                'web' => 'https://sekolahloka.com/data/sma-ittihadul-falah/',
                
            ],
            [
                'nama' => 'SMA Karya Lotara',
                'alamat' => 'Jl.pawang Timpas',
                'lokasi_latlng' => '-8.252058926099552, 116.34111616692111',
                'web' => 'https://sekolahloka.com/data/sma-karya-lotara/',
                
            ],
            [
                'nama' => 'SMA Pariwisata Tanjung',
                'alamat' => 'Jl. Raya Tanjung - Senggigi',
                'lokasi_latlng' => '-8.442270142161535, 116.04336292828665',
                'web' => 'https://sekolahloka.com/data/smas-pariwisata-tanjung/',
                
            ],
            [
                'nama' => 'SMAN 1 Bayan',
                'alamat' => 'Jl. Raya Tanjung - Bayan',
                'lokasi_latlng' => '-8.228400841665765, 116.41807181350727',
                'web' => 'https://sekolahloka.com/data/sman-1-bayan/',
                
            ],
            [
                'nama' => 'SMAN 1 Pemenang',
                'alamat' => 'Jl. Raya Pemenang',
                'lokasi_latlng' => '-8.400453633652656, 116.10389521350723',
                'web' => 'https://sekolahloka.com/data/sman-1-pemenang/',
                
            ],
            [
                'nama' => 'SMA Negeri 2 Bayan',
                'alamat' => 'Ancak',
                'lokasi_latlng' => '-8.257539876233919, 116.42776685896942',
                'web' => 'https://sekolahloka.com/data/sma-negeri-2-bayan/',
                
            ],
            [
                'nama' => 'SMA Islam Al Ikhwan',
                'alamat' => 'Jl. Jur. Santong - Kayangan',
                'lokasi_latlng' => '----------------',
                'web' => 'https://sekolahloka.com/data/smas-islam-al-ikhwan/',
                
            ],
            [
                'nama' => 'SMA Islam Islahul Ummah',
                'alamat' => 'Paok Rempek, Ds. Genggelang',
                'lokasi_latlng' => '-8.360883984216585, 116.24566675214172',
                'web' => 'https://sekolahloka.com/data/smas-islam-islahul-ummah/',
                
            ],
            [
                'nama' => 'SMA Al Maarif Darussalam',
                'alamat' => 'Jln Raya Tanjuung- Gangga, Dusun Montong Pal 83353',
                'lokasi_latlng' => '-8.343390388134333, 116.26575113291437',
                'web' => 'https://sekolahloka.com/data/smas-al-maarif-darussalam/',
                
            ],
            [
                'nama' => 'SMA NW SAMBIK ELEN',
                'alamat' => 'Sambik Elen',
                'lokasi_latlng' => '-8.261473906870723, 116.47055967983727',
                'web' => '',
                
            ],
        ];

        DB::table('sekolahs')->insert($sekolahs);
    }
}
