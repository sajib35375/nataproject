<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dormatory_G(){
        return $this->belongsTo(Dormatory::class,'dormatory_id','id');
    }

    public function grade_G(){
        return $this->belongsTo(Grade::class,'grade_id','id');
    }
}
