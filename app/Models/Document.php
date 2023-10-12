<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function session(){
        return $this->belongsTo(Asession::class,'session_id','id');
    }

    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
}
