<?php

namespace App\Http\Controllers\Insurance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    //
    public function AddInsurance()
    {
        return view('super_admin.Insurance.add_insurance');
    }
}
