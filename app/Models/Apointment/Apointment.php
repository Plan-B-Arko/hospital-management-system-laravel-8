<?php

namespace App\Models\Apointment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo("App\Models\Patient", 'patient_id', 'patient_id');
    }

    public function doctorDept()
    {
        return $this->belongsTo("App\Models\DoctorDept", 'doctorDept_id');
    }

    public function doctor()
    {
        return $this->belongsTo("App\Models\Doctor", 'doctor_id', 'id');
    }
}
