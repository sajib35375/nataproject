<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Droom extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function domatory(){
       return $this->belongsTo(Dormatory::class,'dormatory_id','id');
    }
    public function grade(){
        return $this->belongsTo(Grade::class,'grade_id','id');
    }
    public function gender(){
        return $this->belongsTo(Gender::class,'gender_id','id');
    }

    }
