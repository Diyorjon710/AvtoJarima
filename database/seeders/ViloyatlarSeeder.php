<?php

namespace Database\Seeders;

use App\Models\Viloyatlar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViloyatlarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Viloyatlar::create([
            'id' => 1,
            'viloyat_nomi' => 'Toshkent shahar',
            'viloyat_raqami' => '01',
            'tuman_id' => 1,
        ]);
    }
}
