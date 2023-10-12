<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proupozila extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function division(){
        return $this -> belongsTo(Prodivision::class,'division_id','id');
    }

    public function district(){
        return $this -> belongsTo(Prodistrict::class,'district_id','id');
    }
}
