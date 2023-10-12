<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perdistrict extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function perdivision(){
        return $this->belongsTo(Perdivision::class,'division_id','id');
    }

}
