<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tumanlar extends Model
{
    use HasFactory;

    protected $table =  "tumanlar";

    public function maydonlar(){
        return $this->hasMany(Maydonlar::class);
    }

    public function viloyat(){
        $this->belongsTo(Viloyatlar::class);
    }
}
