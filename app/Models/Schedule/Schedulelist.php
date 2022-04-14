<?php

namespace App\Models\Schedule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedulelist extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function schedulename(){
        return $this->belongsTo("App\Models\Schedule\Schedule",'slot_id');
    }
    public function doctorname(){
        return $this->belongsTo("App\Models\Doctor",'doctor_id');
    }
}
