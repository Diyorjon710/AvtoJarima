<?php

namespace Database\Seeders;

use App\Models\Mashinalar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MashinalarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mashinalar::create([
            'id'=>1,
            'car_name' => 'Malibu',
            'car_number' => 'A123EA',
            'car_jarimasi' => 'Palasani bosgan',
            'car_jarima_narxi' => 120000,
            'car_image' => 'smpdmkfps.jpg',
            'maydon_id' => 1,
            'viloyat_id' => 1,
            'tuman_id' => 8,
        ]);
    }
}
