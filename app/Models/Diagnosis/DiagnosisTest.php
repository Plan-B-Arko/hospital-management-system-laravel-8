<?php

namespace App\Models\Diagnosis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosisTest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function patient(){
        return $this->belongsTo("App\Models\Patient",'patient_id');
    }

    public function doctor(){
        return $this->belongsTo("App\Models\Doctor",'doctor_id');
    }

    public function diagnosis(){
        return $this->belongsTo("App\Models\Diagnosis\Diagnosis",'diagnosis_category_id');
    }
}
