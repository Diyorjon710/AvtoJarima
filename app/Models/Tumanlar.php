<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tumanlar extends Model
{
    use HasFactory;

    protected $table =  "tumanlar";

    public function viloyatlar(){
        return $this->hasMany(Viloyatlar::class);
    }

    public function maydon(){
        $this->belongsTo(Maydonlar::class);
    }
}
