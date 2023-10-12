<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perupozila extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function division(){
        return $this -> belongsTo(Perdivision::class,'division_id','id');
    }

    public function perdistrict(){
        return $this -> belongsTo(Perdistrict::class,'district_id','id');
    }
}
