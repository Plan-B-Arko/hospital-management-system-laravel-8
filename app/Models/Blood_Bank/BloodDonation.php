<?php

namespace App\Models\Blood_Bank;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodDonation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function donor(){
    	return $this->belongsTo(BloodDonor::class,'donor_id','id');
    }
}
