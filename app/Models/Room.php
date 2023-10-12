<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dormatory_r(){
        return $this->belongsTo(Dormatory::class,'dormatory_id','id');
    }

    public function grade_r(){
        return $this->belongsTo(Grade::class,'grade_id','id');
    }

    public function gender_r(){
        return $this->belongsTo(Gender::class,'gender_id','id');
    }
    public function room_r(){
        return $this->belongsTo(Droom::class,'room_id','id');
    }
    public function user_r(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function apply_r(){
        return $this->belongsTo(Apply::class,'apply_id','id');
    }

    }
