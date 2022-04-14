<?php

namespace App\Models\Record;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeathRecord extends Model
{
    use HasFactory;

    public function patient(){
        return $this->belongsTo("App\Models\Patient",'patient_name_id','id');
    }
}
