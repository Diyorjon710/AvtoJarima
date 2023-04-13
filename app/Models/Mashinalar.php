<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mashinalar extends Model
{
    use HasFactory;


    protected $table =  "mashinalar";

    public function maydonlar(){
        return $this->hasMany(Maydonlar::class);
    }
}
