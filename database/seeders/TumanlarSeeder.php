<?php

namespace Database\Seeders;

use App\Models\Tumanlar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TumanlarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tumanlar::create([
            'id' => 1,
            'tuman_nomi' => 'Chilonzor',
            'viloyat_id'=>1,
        ]);
        Tumanlar::create([
            'id' => 2,
            'tuman_nomi' => 'Shayxontohur',
            'viloyat_id'=>1,
        ]);
        Tumanlar::create([
            'id' => 3,
            'tuman_nomi' => 'Uchtepa',
            'viloyat_id'=>1,
        ]);

        Tumanlar::create([
            'id' => 4,
            'tuman_nomi' => 'Bektemir',
            'viloyat_id'=>1,
        ]);

        Tumanlar::create([
            'id' => 5,
            'tuman_nomi' => 'Mirobod',
            'viloyat_id'=>1,
        ]);

        Tumanlar::create([
            'id' => 6,
            'tuman_nomi' => 'Mirzo Ulug\'bek',
            'viloyat_id'=>1,
        ]);

        Tumanlar::create([
            'id' => 7,
            'tuman_nomi' => 'Olmazor',
            'viloyat_id'=>1,
        ]);

        Tumanlar::create([
            'id' => 8,
            'tuman_nomi' => 'Sergeli',
            'viloyat_id'=>1,
        ]);

        Tumanlar::create([
            'id' => 9,
            'tuman_nomi' => 'Yakkasaroy',
            'viloyat_id'=>1,
        ]);

        Tumanlar::create([
            'id' => 10,
            'tuman_nomi' => 'Uchtepa',
            'viloyat_id'=>1,
        ]);

    }
}
