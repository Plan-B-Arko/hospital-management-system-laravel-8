<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class NewBedAllotment extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;
  
public function bed(){
        return $this->belongsTo(NewBed::class,'new_bed_id');
    }
    public function patient(){
        return $this->belongsTo("App\Models\Patient",'patient_id');
    }
    public function doctor(){
        return $this->belongsTo("App\Models\Doctor",'doctor_id');
    }
    public function bedTypeName()
    {
        return $this->belongsToThrough('App\Models\NewBedType', 'App\Models\NewBed');
    }
}
