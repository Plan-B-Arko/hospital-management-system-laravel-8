<?php

namespace App\Models;

use App\Models\Prescription\MedicinePrescription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function medicinePrescriptions()
    {
        return $this->hasMany(MedicinePrescription::class, 'prescription_id', 'id');
    }
}
