<?php

namespace App\Models\Blood_Bank;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blood_Issue extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function patient(){
        return $this->belongsTo("App\Models\Patient",'patient_id');
    }

    public function doctor(){
        return $this->belongsTo("App\Models\Doctor",'doctor_id');
    }

    public function donor(){
        return $this->belongsTo(BloodDonor::class,'donor_id');
    }
      
}
