<?php

namespace App\Http\Controllers\Prescription;

use App\Http\Controllers\Controller;
use App\Models\Medicine\Medicine;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Prescription\PatientCaseStudy;
use App\Models\Prescription\MedicinePrescription;
use App\Models\Prescription\DiagnosisPrescription;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{

    //prescription view
    public function PrescriptionView()
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $prescriptions = Prescription::where('outlet_id', $auth_id)->get();
        return view('super_admin.prescription.view_prescription', compact('prescriptions'));
    }
    //
    public function PrescriptionAdd()
    {
        return view('super_admin.prescription.add_prescription');
    }

    public function DeatilsPrescription($id)
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $patients  =  Patient::where('patient_id', $id)->where('outlet_id', $auth_id)->get();
        $casestudy  =  PatientCaseStudy::where('patient_id', $id)->where('outlet_id', $auth_id)->get();
        return response()->json([
            'status' => 200,
            'patients' => $patients,
            'casestudy' => $casestudy,
        ]);
    }

    public function Patientname($patientname)
    {
        $patient = Patient::where('patient_id', 'like', $patientname)->first();
        return response()->json($patient);
    }

    // for prescription add
    public function PrescriptionStore(Request $request)
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required',
            'visiting_fees' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'errors' => $validator->errors()
                ],
                422
            );
        } else {
            $prescription = new Prescription;
            $prescription->outlet_id = $auth_id;
            $prescription->patient_id = $request->input('patient_id');
            $prescription->patient_name = $request->input('patient_name');
            $prescription->sex = $request->input('sex');
            $prescription->dob = $request->input('dob');
            $prescription->weight = $request->input('weight');
            $prescription->blood_pressure = $request->input('blood_pressure');
            $prescription->reference = $request->input('reference');
            $prescription->type = $request->input('type');
            $prescription->appointment_id = $request->input('appointment_id');
            $prescription->date = $request->input('date');
            $prescription->hospital_name = $request->input('hospital_name');
            $prescription->address = $request->input('address');
            $prescription->visiting_fees = $request->input('visiting_fees');
            $prescription->patient_notes = $request->input('patient_notes');
            $prescription->cheif_complain = $request->input('cheif_complain');
            $prescription->insurance = $request->input('insurance');
            $prescription->save();

            $medicine_name = $request->medicine_name;
            $medicine_type = $request->medicine_type;
            $medicine_instruction = $request->medicine_instruction;
            $days = $request->days;
            foreach ($medicine_name as $key => $mn) {
                $data = array(
                    'medicine_name' => $mn,
                    'medicine_type' => $medicine_type[$key],
                    'medicine_instruction' => $medicine_instruction[$key],
                    'days' => $days[$key],
                    'prescription_id'  => $prescription->id
                );
                $insert_data[] = $data;
            }

            MedicinePrescription::insert($insert_data);
            //    for diagnosis
            $diagnosis = $request->diagnosis;
            $instruction = $request->instruction;
            foreach ($diagnosis as $key => $dd) {
                $data2 = array(
                    'diagnosis' => $dd,
                    'instruction' => $instruction[$key],
                    'prescription_id'  => $prescription->id
                );
                $insert_data2[] = $data2;
            }
            DiagnosisPrescription::insert($insert_data2);
            return response()->json([
                'status' => 200,
                'message' => 'Prescription Added Successfully.'
            ]);
        }
    }



    // method for editing patient data
    public function patientPrescriptionForEdit($id)
    {
        $prescription = Prescription::where('id', $id)->first();
        $patient  = Patient::where('patient_id', $prescription->patient_id)->first();
        $patientcasestudy  = PatientCaseStudy::where('patient_id', $prescription->patient_id)->first();

        // dd($patient);
        //    $prescription = Prescription::where('patient_id',$patient->patient_id)->first();
        //    dd($prescription);
        return view('super_admin.prescription.edit_prescription', compact('patient', 'prescription', 'patientcasestudy'));
    }

    public function getPrescriptionMedicineForEdit($prescription_id)
    {
        $medicinePrescriptions = MedicinePrescription::where('prescription_id', $prescription_id)->get();
        if ($medicinePrescriptions->count() == 0) {
            return response()->json(['error' => "NOt Found"], 404);
        }
        return response()->json(compact('medicinePrescriptions'));
    }

    public function getDiagonosisForEdit($prescription_id)
    {
        $diagonosisPrescriptions = DiagnosisPrescription::where('prescription_id', $prescription_id)->get();
        if ($diagonosisPrescriptions->count() == 0) {
            return response()->json(['error' => "Not Found"], 404);
        }
        return response()->json(compact('diagonosisPrescriptions'));
    }

    // / Edit Method
    // public function ExpenseEdit($id){
    //     $expense = MedicinePrescription::find($id);
    //     if($expense){
    //         return response()->json(['expense' =>$expense]);
    //     }
    //     else{
    //         return response()->json(['message' => 'Not Found'],404);
    //     }
    // } // end edit
    //update Method
    public function PrescriptionUpdate(Request $request, $id)
    {
        // dd($request->all()); //eta prescription id = $id;tahole medicine r jnno ki alada nibo.ami eksathe dicilam
        // "token" => "Wwn3yw2W8ToXEgBhuPZbsbbH5hVwXJPd06HE7lFn"
        // "prescription_id" => null
        // "patient_id" => "PTD-00"
        // "patient_name" => null
        // "sex" => "male"
        // "dob" => "2021-12-01"
        // "weight" => null
        // "blood_pressure" => null
        // "reference" => null
        // "appointment_id" => "ABC1234"
        // "date" => null
        // "hospital_name" => "Demo Hospital Limited"
        // "address" => "xdcvb"
        // "cheif_complain" => null
        // "medicine_name" => array:4 [
        //     0 => "fdgghfgh"
        //     1 => "hng"
        //     2 => "fdgghfgh"
        //     3 => "fdgdfgfb"
        // ]
        // "medicine_type" => array:4 [
        //     0 => "gbfdgbfb"
        //     1 => "fhng"
        //     2 => "gbfdgbfb"
        //     3 => "fgbfbfb"
        // ]
        // "medicine_instruction" => array:4 [
        //     0 => "fghfgh"
        //     1 => "fghfghfgh"
        //     2 => "dfgdfgdf"
        //     3 => "fghfghgfh"
        // ]
        // "days" => array:4 [
        //     0 => "12"
        //     1 => "3"
        //     2 => "2"
        //     3 => "12"
        // ]
        // "diagnosis" => array:3 [
        //     0 => "fghbghff"
        //     1 => "fgbhfgbfgb"
        //     2 => "dsafasf"
        // ]
        // "instruction" => array:3 [
        //     0 => "fgbhbfgb"
        //     1 => "fbfgbhfgbgfb"
        //     2 => "asdfasdfasdf"
        // ]
        // "visiting_fees" => "24324"
        // "patient_notes" => "2341234234"
        // ]

        // egula kun table add hobe

        //ei code gula lagbe? na.radia apur chilo


        $validator = Validator::make($request->all(), [
            // 'bed_types' => 'required|max:191',
            // 'description' => 'required|max:191',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        // data update hoice?




        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $prescriptionupdate = Prescription::find($id);

        if (!$prescriptionupdate) {
            return response()->json(['Error' => 'No prescription Found'], 404);
        }



        try {
            DB::beginTransaction();
            //first delete previous prescription
            MedicinePrescription::where('prescription_id', $id)->delete();
            DiagnosisPrescription::where('prescription_id', $id)->delete();


            $prescriptionData = array(
                'outlet_id' => $auth_id,
                'patient_id' => $request->input('patient_id'),
                'patient_name' => $request->input('patient_name'),
                'sex' => $request->input('sex'),
                'dob' => $request->input('dob'),
                'weight' => $request->input('weight'),
                'blood_pressure' =>  $request->input('blood_pressure'),
                'reference' => $request->input('reference'),
                'type' =>  $request->input('type'),
                'appointment_id' => $request->input('appointment_id'),
                'date' => $request->input('date'),
                'hospital_name' => $request->input('hospital_name'),
                'address' => $request->input('address'),
                'visiting_fees' => $request->input('visiting_fees'),
                'patient_notes' => $request->input('patient_notes'),
                'cheif_complain' =>  $request->input('cheif_complain'),
                'insurance' =>  $request->input('insurance'),

            );
            // `prescription_id`, `medicine_name`, `medicine_type`, `medicine_instruction`, `days`,
            $prescriptionupdate->update($prescriptionData);


            ///add medicine prescriptions
            foreach ($request->input('medicine_name') as $key => $medicine_name) {
                $medicineData = array(
                    'prescription_id'      => $prescriptionupdate->id,
                    'medicine_name'        => $medicine_name,
                    'medicine_type'        => $request->input('medicine_type')[$key],
                    'medicine_instruction' => $request->input('medicine_instruction')[$key],
                    'days' => $request->input('days')[$key],
                );
                MedicinePrescription::create($medicineData);
            }
            //medicine end

            ///add medicine prescriptionsprescription_id`, `diagnosis`, `instruction`,
            foreach ($request->input('diagnosis') as $key => $diagnosis) {
                $diagnosisData = array(
                    'prescription_id'      => $prescriptionupdate->id,
                    'diagnosis'        => $diagnosis,
                    'instruction'        => $request->input('instruction')[$key],
                );
                DiagnosisPrescription::create($diagnosisData);
            }
            //medicine end

            DB::commit();
            return response()->json(['success', 'Prescription Data has been updated Successfully!']);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['error', 'some Error Occured Please Try Again!'], 500);
        }






        // "diagnosis" => array:3 [
        //     0 => "fghbghff"
        //     1 => "fgbhfgbfgb"
        //     2 => "dsafasf"
        // ]
        // "instruction" => array:3 [
        //     0 => "fgbhbfgb"
        //     1 => "fbfgbhfgbgfb"
        //     2 => "asdfasdfasdf"
        // ]
        // vaia aitar table medicine Prescription
        $medicinenupdate = MedicinePrescription::find($id); //id kutha theke pechen?aita jei id dhore update hobe oitar jnno bolchilam
        if ($medicinenupdate) {
            $last3 = DB::table('prescriptions')->latest('id')->first();
            $last = $last3->id;
            foreach ($request->input('medicine_name') as $key => $mn) {
                $data = array(
                    'medicine_name' => $mn,
                    'medicine_type' => $request->input('medicine_type')[$key],
                    'medicine_instruction' => $request->input('medicine_instruction')[$key],
                    'days' => $request->input('days')[$key],
                    'prescription_id'  => $last,
                );
                $insert_data[] = $data;
            }
            // dd($insert_data);
            MedicinePrescription::create($insert_data);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Prescription Updated Successfully.'
        ]);


        //////////// for medicine ///////////////////////////////////////
        // $auth_id = Auth::guard('admin')->user()->outlet_id;

        //////////// for diagnosis///////////////////////
        // $auth_id = Auth::guard('admin')->user()->outlet_id;
        $medicinenupdate = DiagnosisPrescription::find($id);
        if ($medicinenupdate) {
            $last3 = DB::table('prescriptions')->latest('id')->first();
            $last = $last3->id;
            foreach ($request->input('diagnosis') as $key => $pp) {
                $data = array(
                    'diagnosis' => $pp,
                    'instruction' => $request->input('instruction')[$key],
                    'prescription_id'  => $last,
                );
                $insert_data[] = $data;
            }
            // dd($insert_data);
            DiagnosisPrescription::create($insert_data);
        }
    }
}
