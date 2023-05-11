<?php

namespace App\Exports;

use App\Models\Mashinalar;
use Maatwebsite\Excel\Concerns\FromCollection;

class CarsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mashinalar::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'car_name',
            'car_number',
            'car_jarimasi',
            'car_jarima_narxi',
            'car_image',
            'maydon_id',
            'viloyat_id',
            'tuman_id',
            'maydon_id',
            'created_at',
            'updated_at',
        ];
    }
}
