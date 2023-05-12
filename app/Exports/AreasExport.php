<?php

namespace App\Exports;

use App\Models\Maydonlar;
use Maatwebsite\Excel\Concerns\FromCollection;

class AreasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Maydonlar::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'maydon_nomi',
            'maydon_lokatsiyasi',
            'created_at',
            'updated_at',
        ];
    }
}
