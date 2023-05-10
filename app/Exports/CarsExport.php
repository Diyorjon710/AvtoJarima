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
}
