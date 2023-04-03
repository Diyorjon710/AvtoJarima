<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Mashinalar;
use App\Models\Viloyatlar;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           MaydonlarSeeder::class,
           TumanlarSeeder::class,
            ViloyatlarSeeder::class,
            MashinalarSeeder::class,
        ]);
    }
}
