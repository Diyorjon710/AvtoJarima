<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maydonlar extends Model
{
    use HasFactory;

    protected $table =  "maydonlar";

    protected $fillable = [
        'maydon_nomi',
        'maydon_lokatsiyasi',
        'tuman_id'
    ];

    public function tumanlar(){
        return $this->hasMany(Tumanlar::class);
    }

    public function mashina(){
        $this->belongsTo(Mashinalar::class);
    }
}
