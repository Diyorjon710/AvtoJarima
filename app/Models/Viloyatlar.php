<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viloyatlar extends Model
{
    use HasFactory;


    protected $table =  "viloyatlar";



    public function tuman(){
        $this->belongsTo(Tumanlar::class);
    }


}
