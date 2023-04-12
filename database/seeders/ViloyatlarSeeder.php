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
        ]);

        Viloyatlar::create([
            'id' => 2,
            'viloyat_nomi' => 'Toshkent viloyati',
            'viloyat_raqami' => '10',
        ]);

        Viloyatlar::create([
            'id' => 3,
            'viloyat_nomi' => 'Sirdaryo viloyati',
            'viloyat_raqami' => '20',
        ]);

        Viloyatlar::create([
            'id' => 4,
            'viloyat_nomi' => 'Jizzax viloyati',
            'viloyat_raqami' => '25',
        ]);

        Viloyatlar::create([
            'id' => 5,
            'viloyat_nomi' => 'Samarqand viloyati',
            'viloyat_raqami' => '30',
        ]);

        Viloyatlar::create([
            'id' => 6,
            'viloyat_nomi' => 'Farg\'ona viloyati',
            'viloyat_raqami' => '40',
        ]);

        Viloyatlar::create([
            'id' => 7,
            'viloyat_nomi' => 'Namangan viloyati',
            'viloyat_raqami' => '50',
        ]);

        Viloyatlar::create([
            'id' => 8,
            'viloyat_nomi' => 'Andijon viloyati',
            'viloyat_raqami' => '60',
        ]);

        Viloyatlar::create([
            'id' => 9,
            'viloyat_nomi' => 'Qashqadaryo viloyati',
            'viloyat_raqami' => '70',
        ]);

        Viloyatlar::create([
            'id' => 10,
            'viloyat_nomi' => 'Surxondaryo viloyati',
            'viloyat_raqami' => '75',
        ]);

        Viloyatlar::create([
            'id' => 11,
            'viloyat_nomi' => 'Buxoro viloyati',
            'viloyat_raqami' => '80',
        ]);

        Viloyatlar::create([
            'id' => 12,
            'viloyat_nomi' => 'Navoiy viloyati',
            'viloyat_raqami' => '85',
        ]);

        Viloyatlar::create([
            'id' => 13,
            'viloyat_nomi' => 'Xorazm viloyati',
            'viloyat_raqami' => '90',
        ]);

        Viloyatlar::create([
            'id' => 14,
            'viloyat_nomi' => "Qoraqalpog'iston Respublikasi",
            'viloyat_raqami' => '95',
        ]);
    }
}
