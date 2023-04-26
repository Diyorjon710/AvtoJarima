<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mashinalar extends Model
{
    use HasFactory;


    protected $table =  "mashinalar";
    protected $fillable = [
        'car_name',
        'car_number',
        'car_jarimasi',
        'car_jarima_narxi',
        'car_image',
        'maydon_id',
        'tuman_id',
        'viloyat_id',
    ];

    public function maydonlar(){
        return $this->hasMany(Maydonlar::class);
    }
}
