<?php

namespace Database\Seeders;

use App\Models\Maydonlar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaydonlarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Maydonlar::create([
            'id' => 1,
            'maydon_nomi' => 'Qumariq 12/1',
            'maydon_lokatsiyasi'=> '41.245282, 69.259578',
            'tuman_id'=>8,
        ]);
    }
}
