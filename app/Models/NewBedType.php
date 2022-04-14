<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NewBed;


class NewBedType extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function newBed(){
        
        return $this->hasMany(NewBed::class,'new_bed_type_id','id');
    }
}
