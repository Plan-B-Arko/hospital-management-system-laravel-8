<?php

namespace App\Http\Controllers\Diagnosis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Diagnosis\DiagnosisTest;
use App\Models\Diagnosis\Diagnosis;
use Carbon\carbon;
use Auth;


class DiagnosisController extends Controller
{
    // diagnosis test View start 
    public function DignsosisTestView(){
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $patients=Patient::where('outlet_id', $auth_id)->get();
        $doctors=Doctor::where('outlet_id', $auth_id)->get();
        $diagnosis=Diagnosis::where('outlet_id', $auth_id)->get();
        $diagnosisTests=DiagnosisTest::with('patient','doctor','diagnosis')->get();
        return view('Diagnosis.view_diagnosis_test',compact('doctors','patients','diagnosis','diagnosisTests'));
    }

    // diagnosis test View store
    public function DignsosisTestStore(Request $request){
        $auth_id = Auth::guard('admin')->user()->outlet_id;
         $request->validate([
            'patient_id' => 'required',   
            'doctor_id' => 'required',    
        ]);

        DiagnosisTest::insert([
            'outlet_id' => $auth_id,
            'patient_id' => $request->patient_id,
            'doctor_id'  => $request->doctor_id,
            'diagnosis_category_id' => $request->diagnosis_id,
            'report_number' => $request->report_number,
            'age' => $request->age,
            'height' => $request->height,
            'weight' => $request->weight,
            'average_glucose' => $request->glucose,
            'urine_sugar' => $request->urine,
            'blood_pressure' => $request->blood_pressure,
            'diabetes' => $request->diabetis,
            'cholesterol' => $request->cholestrol,
            'created_at' => carbon::now(),
        ]);

         $notification = array(
                'message' =>  'Diagnosis Test Added Successfuly',
                'alert-type' => 'success'
          );     
        return redirect()->back()->with($notification);
    }

    // diagnosis test delete
    public function DignsosisTestDelete($id){
        DiagnosisTest::findOrFail($id)->delete(); 
        return redirect()->back();
    }

    // diagnosis category edit 
    public function DiagnosisCategoryEdit($id){
        $diagnosisTests = DiagnosisTest::find($id);
         return response()->json([
            'status' =>200,
            'diagnosisTests' => $diagnosisTests,
         ]);
    }

    // diagnosis category update
    public function DiagnosisCategoryUpdate(Request $request){

        $diagnosis_id=$request->input('diagnosis_id');
        
        $diagnosisTest =DiagnosisTest::find($diagnosis_id);
        // dd($bloodissue);
        $diagnosisTest->doctor_id=$request->doctor_id;
        $diagnosisTest->patient_id=$request->patient_id;
        $diagnosisTest->diagnosis_category_id=$request->diagnosis_test_id;
        $diagnosisTest->report_number=$request->report_number;
        $diagnosisTest->age=$request->age;
        $diagnosisTest->height=$request->height;
        $diagnosisTest->weight=$request->weight;
        $diagnosisTest->average_glucose=$request->glucose;
        $diagnosisTest->urine_sugar=$request->urine;
        $diagnosisTest->blood_pressure=$request->blood_pressure;
        $diagnosisTest->diabetes=$request->diabetis;
        $diagnosisTest->cholesterol=$request->cholestrol;
        $diagnosisTest->update();

        $notification=array(
            'message'=>'Diagnosis Updated Successfully',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);
    }

}
