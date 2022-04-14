<?php

namespace App\Http\Controllers\Blood_Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Blood_Bank\BloodDonor;
use App\Models\Blood_Bank\Blood_Issue;
use Carbon\carbon;
use Illuminate\Support\Facades\Validator;
use Auth;

class BloodIssueController extends Controller
{
    // blood issue view
    public function BloodIssueView(){
        $auth_id = Auth::guard('admin')->user()->outlet_id;

        $doctors=Doctor::where('outlet_id', $auth_id)->get();
        $patients=Patient::where('outlet_id', $auth_id)->get();
        $donors=BloodDonor::where('outlet_id', $auth_id)->get();
        $bloods=Blood_Issue::with('doctor','patient','donor')->where('outlet_id', $auth_id)->get();
        return view('Blood_Bank.view_blood_issue',compact('doctors','patients','donors','bloods'));
    }

    // blood donor ajax view
    public function BloodDonorGroup($donor_id){
        $donor_blood = BloodDonor::where('id',$donor_id)->get();
        return json_encode($donor_blood);
    }

    // blood donor group ajax view
    public function BloodDonorGroupEdit($blood_id){
        $donor_blood_edit = BloodDonor::where('id',$blood_id)->get();
        return json_encode($donor_blood_edit);
    }

    // blood issue store
    public function BloodIssueStore(Request $request){
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $validator = Validator::make($request->all(), [
            'doctor_name'=> 'required',
            'patient_name'=> 'required',
            'donor_id'=> 'required',
            'remarks'=> 'required',
            'amount'=> 'required | numeric',
        ],[
            'doctor_name.required' => 'Doctor name is required',
            'patient_name.required' => 'Patient name is required',
            'donor_id.required' => 'Donor name is required',
            'remarks.required' => 'Remarks field is required',
            'amount.required' => 'Amount is required'
        ]);

       if($validator->fails())
          {
              return response()->json([
                  'status'=>400,
                  'errors'=>$validator->messages()
              ]);
          }
          else
          {
              Blood_Issue::insert([
                'outlet_id' => $auth_id,

                    'doctor_id' => $request->doctor_name,
                    'patient_id' => $request->patient_name,
                    'donor_id' => $request->donor_id,
                    'blood_group' => $request->blood_donor_group,
                    'remarks' => $request->remarks,
                    'amount' => $request->amount,
                    'created_at' => Carbon::now(),
            ]);
              return response()->json([
                  'status'=>200,
                  'message'=>'Donor Added Successfuly',
              ]);
          }

    }

    // blood issue delete
    public function BloodIssueDelete($id){
        Blood_Issue::findOrFail($id)->delete(); 
        return redirect()->back();
    }

    // blood issue edit
    public function BloodIssueEdit($bloodissue_id){         
         $blood_issue = Blood_Issue::find($bloodissue_id);
         return response()->json([
            'status' =>200,
            'blood_issue' => $blood_issue,
         ]);
    }

    // blood issue update
    public function BloodDonorGroupUpdate(Request $request,$id){
        
          $validator = Validator::make($request->all(), [
            'blood_donor_group'=> 'required',
            'remarks'=> 'required',
            'amount'=> 'required | numeric',
        ],[
            'remarks.required' => 'Remarks field is required',
            'amount.required' => 'Amount is required',
            'blood_donor_group.required' => 'Blood Group is required'
        ]);

          if($validator->fails())
          {
              return response()->json([
                  'status'=>400,
                  'errors'=>$validator->messages()
              ]);
          }
          else
          {
                $bloodissue =Blood_Issue::find($id);
                $bloodissue->doctor_id=$request->doctor_name;
                $bloodissue->patient_id=$request->patient_name;
                $bloodissue->donor_id=$request->donor_id;
                $bloodissue->blood_group=$request->blood_donor_group;
                $bloodissue->remarks=$request->remarks;
                $bloodissue->amount=$request->amount;
                $bloodissue->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Blood Issue Updated Successfully.'
                ]);
          } 

    }
}
