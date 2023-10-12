<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function course(){
        return $this ->belongsTo(Course::class,'course_id','id');
    }
    public function session(){
        return $this ->belongsTo(Asession::class,'session_id','id');
    }
    public function pdivision(){
        return $this ->belongsTo(Perdivision::class,'p_division','id');
    }
    public function pdistrict(){
        return $this ->belongsTo(Perdistrict::class,'p_district','id');
    }
    public function pupozila(){
        return $this ->belongsTo(Perupozila::class,'p_upozila','id');
    }
    public function proupozila(){
        return $this ->belongsTo(Proupozila::class,'c_upozila','id');
    }
    public function prodistrict(){
        return $this ->belongsTo(Prodistrict::class,'b_district','id');
    }
}
