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
            'maydon_id'=>1,
        ]);
        Tumanlar::create([
            'id' => 2,
            'tuman_nomi' => 'Shayxontohur',
            'maydon_id'=>1,
        ]);
        Tumanlar::create([
            'id' => 3,
            'tuman_nomi' => 'Uchtepa',
            'maydon_id'=>1,
        ]);
    }
}
