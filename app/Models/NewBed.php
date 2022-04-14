<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class NewBed extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function newbed(){
    	return $this->belongsTo(NewBedType::class,'new_bed_type_id','id');
    }

}
