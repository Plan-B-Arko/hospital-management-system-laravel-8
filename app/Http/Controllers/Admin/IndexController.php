<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nurse\Nurse;
use App\Models\Laboratorist\Laboratorist;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Pharmacist;
use App\Models\Receptionist;
use App\Models\Accountant;
use App\Models\NewBed;

class IndexController extends Controller
{
    public function DashboardView(){
         $doctors = Doctor::all()->count();
         $patients = Patient::all()->count();
         $receptionist = Receptionist::all()->count();
         $pharmacist = Pharmacist::all()->count();
         $nurses = Nurse::all()->count();
         $laboratorist = Laboratorist::all()->count();
         $accountant = Accountant::all()->count();
         $allbed = NewBed::where('status','0')->count();
         //  dd($patients);
         return view('super_admin.home',compact('doctors','patients','receptionist','pharmacist','nurses','laboratorist','accountant','allbed'));
    }
}
