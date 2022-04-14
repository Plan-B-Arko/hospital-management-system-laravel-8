<?php

namespace App\Models\Medicine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineList extends Model
{
    use HasFactory;
    protected $guarded = [];
    
     public function Medicinecategory(){
        return $this->belongsTo("App\Models\Medicine\MedicineCategory",'category');
    }
    public function Medicinetype(){
        return $this->belongsTo("App\Models\Medicine\Medicine",'medicine_type');
    }
    public function MedicineManufacture(){
        return $this->belongsTo("App\Models\Medicine\Medicine_manufacture",'manufacturer');
    }
}
