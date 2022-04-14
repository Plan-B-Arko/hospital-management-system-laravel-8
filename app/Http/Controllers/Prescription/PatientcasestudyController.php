<?php

namespace App\Http\Controllers\Prescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prescription\PatientCaseStudy;
use App\Models\Check;
use App\Models\Prescription\Others_Case_Study;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PatientcasestudyController extends Controller
{
    // view
    public function PrescriptionCaseStudyView()
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $casestudys = PatientCaseStudy::where('outlet_id', $auth_id)->get();
        return view('super_admin.prescription.view_patient_case_study', compact('casestudys'));
    }
    // add
    public function PrescriptionCaseStudyAdd()
    {
        return view('super_admin.prescription.add_patient_case_study');
    }
    public function PrescriptionCaseStudyStore(Request $request)
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $validator = Validator::make($request->all(), [
            'first_name.*'  => 'required',
            'last_name.*'  => 'required',
            'patient_id' => 'required',
        ]);
        //   dd(  $validator );
        if ($validator->fails()) {
            return response()->json(
                [
                    //  'status'=>400,
                    'errors' => $validator->errors()
                ],
                422
            );
        } else {

            $caseStudy = new PatientCaseStudy;
            $caseStudy->outlet_id = $auth_id;
            $caseStudy->patient_id = $request->input('patient_id');
            $caseStudy->food_allergies = $request->input('food_allergies');
            $caseStudy->tendency_bleed = $request->input('tendency_bleed');
            $caseStudy->heart_disease = $request->input('heart_disease');
            $caseStudy->high_blood_pressure = $request->input('high_blood_pressure');
            $caseStudy->diabetic = $request->input('diabetic');
            $caseStudy->surgery = $request->input('surgery');
            $caseStudy->accident = $request->input('accident');
            $caseStudy->family_medical_history = $request->input('family_medical_history');
            $caseStudy->current_medication = $request->input('current_medication');
            $caseStudy->family_pregnency = $request->input('family_pregnency');
            $caseStudy->breast_feeding = $request->input('breast_feeding');
            $caseStudy->health_insurance = $request->input('health_insurance');
            $caseStudy->low_income = $request->input('low_income');
            $caseStudy->weight = $request->input('weight');
            $caseStudy->reference = $request->input('reference');
            $caseStudy->status = $request->input('status');

            $caseStudy->save();

            $others = $request->others;
            $last3 = DB::table('patient_case_studies')->latest('id')->first();
            $last = $last3->id;
            for ($count = 0; $count < count($others); $count++) {
                $data = array(
                    'others' => $others[$count],
                    'case_study_id'  => $last
                );
                $insert_data[] = $data;
            }
            Others_Case_Study::insert($insert_data);
            return response()->json([
                'status' => 200,
                'message' => 'Patient Case Study Added Successfully.'
            ]);
        }
    }
    //  Edit

    // method for editing patient data
    public function PrescriptionCaseStudyEdit($id)
    {
        $casestudy = PatientCaseStudy::find($id);
        return view('super_admin.prescription.edit_patient_case_study', compact('casestudy'));
    }

    //Delete
    public function PrescriptionCaseStudyDelete($id)
    {
        $caseStudy = PatientCaseStudy::findOrFail($id);
        PatientCaseStudy::findOrFail($id)->delete();
        $notification = array(
            'message' =>  ' Deleted Sucessfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function  PrescriptionCaseStudyUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required',
        ]);
        //   dd(  $validator );
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => 400,
                    'errors' => $validator->errors()
                ],
            );
            // 422);
        } else {
            $patient_id = $request->input('id');
            $caseStudy = PatientCaseStudy::find($patient_id);
            $caseStudy->patient_id = $request->input('patient_id');
            $caseStudy->food_allergies = $request->input('food_allergies');
            $caseStudy->tendency_bleed = $request->input('tendency_bleed');
            $caseStudy->heart_disease = $request->input('heart_disease');
            $caseStudy->high_blood_pressure = $request->input('high_blood_pressure');
            $caseStudy->diabetic = $request->input('diabetic');
            $caseStudy->surgery = $request->input('surgery');
            $caseStudy->accident = $request->input('accident');
            $caseStudy->family_medical_history = $request->input('family_medical_history');
            $caseStudy->current_medication = $request->input('current_medication');
            $caseStudy->family_pregnency = $request->input('family_pregnency');
            $caseStudy->breast_feeding = $request->input('breast_feeding');
            $caseStudy->health_insurance = $request->input('health_insurance');
            $caseStudy->low_income = $request->input('low_income');
            $caseStudy->reference = $request->input('reference');
            $caseStudy->status = $request->input('status');

            $caseStudy->update();

            return response()->json([
                'status' => 200,
                'message' => 'Patient Case Study updated Successfully.'
            ]);
        }
    }

    public function Patientname($patientname)
    {
        $patient = Patient::where('patient_id', 'like', $patientname)->first();
        return response()->json($patient);
    }
}
