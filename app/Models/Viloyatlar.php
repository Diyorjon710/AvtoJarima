<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viloyatlar extends Model
{
    use HasFactory;


    protected $table =  "viloyatlar";

    public function tumanlar(){
        return $this->hasMany(Tumanlar::class);
    }

    public function mashina(){
        $this->belongsTo(Mashinalar::class);
    }
}
