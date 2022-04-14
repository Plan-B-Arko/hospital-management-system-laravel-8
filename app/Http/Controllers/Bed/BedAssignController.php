<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewBedAllotment;
use App\Models\NewBed;
use App\Models\NewBedType;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;
use Auth;
class BedAssignController extends Controller
{   
    // bed assign view start
    public function BedAssignView(){
        // $auth_id = Auth::guard('admin')->user()->outlet_id;
          if(Auth::guard('admin')->check()){
           
             $auth_id = Auth::guard('admin')->user()->outlet_id;
        }
        elseif(Auth::guard('doctor')->check()){
            $auth_id = Auth::guard('doctor')->user()->outlet_id;
        }
        $newbednames = NewBed::where('status','0')->where('outlet_id', $auth_id)->get();
        $newbednamesall =NewBed::where('outlet_id', $auth_id)->get();
        $doctors = Doctor::where('outlet_id', $auth_id)->get();
        $patients = Patient::where('outlet_id', $auth_id)->get();
        $bedallotments = NewBedAllotment::with('bed','patient','doctor','bedTypeName')->where('outlet_id', $auth_id)->get();
        return view ('Bed.view_bed_assign',compact('newbednames','doctors','patients','bedallotments','newbednamesall'));
    }

    // bed assign store start

    public function BedAssignStore(Request $request){
       if(Auth::guard('admin')->check()){
           
             $auth_id = Auth::guard('admin')->user()->outlet_id;
        }
        elseif(Auth::guard('doctor')->check()){
            $auth_id = Auth::guard('doctor')->user()->outlet_id;
        }

         $validator = Validator::make($request->all(), [
            'bed_name_id'=> 'required',
            'patient_name_id'=> 'required',
            'doctor_name_id'=> 'required',
            'appointment_date_id'=> 'required', 
            'discharge_date_id'=> 'required',
            'description_id'=> 'required',  
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
            $newbed = NewBed::find($request->bed_name_id);
            $newbed->status = '1';
            $newbed->update();

            $student = new NewBedAllotment;
            $student->outlet_id = $auth_id;
            $student->new_bed_id = $request->input('bed_name_id');
            $student->patient_id = $request->input('patient_name_id');
            $student->doctor_id = $request->input('doctor_name_id');
            $student->allotment_time = $request->input('appointment_date_id');
            $student->discharge_time = $request->input('discharge_date_id');
            $student->discription = $request->input('description_id');
            $student->save();
            return response()->json([
                'status'=>200,
                'message'=>'New bed  Allotment Added Successfully.'
            ]);
        }

    }

    // bed assign status view
    public function BedAssignStatus(){

        $newbedtypes = NewBedType::all();
        return view('Bed.view_bed_status',compact('newbedtypes'));
        
    }

    // bed assign delete 
    public function BedAssignDelete($id){
        
        $bedassign= NewBedAllotment::find($id);

        $newbed = NewBed::find($bedassign->new_bed_id);
        $newbed->status = '0';
        $newbed->update();

        NewBedAllotment::find($id)->delete(); 
        return redirect()->back();

    }

    // bed assign edit
    public function BedAssignEdit($id){
          $bedassign = NewBedAllotment::find($id);
          return response()->json([
              'status' =>200,
              'bedassign' => $bedassign,
          ]);
    }

    // bed assign update
    public function BedAssignUpdate(Request $request,$id){
          
          if(Auth::guard('admin')->check()){
           
             $auth_id = Auth::guard('admin')->user()->outlet_id;
        }
        elseif(Auth::guard('doctor')->check()){
            $auth_id = Auth::guard('doctor')->user()->outlet_id;
        }
          $validator = Validator::make($request->all(), [
            'appointment_date_id'=> 'required', 
            'discharge_date_id'=> 'required',
            'description_id'=> 'required',  
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else
        {
            if($request->old_bed != $request->bed_name_id){

                $newbed1 = NewBed::find($request->old_bed);
                $newbed1->status = '0';
                $newbed1->update(); 

                $newbed2 = NewBed::find($request->bed_name_id);
                $newbed2->status = '1';
                $newbed2->update();

                $newbed = NewBedAllotment::find($id);
                $newbed->new_bed_id = $request->input('bed_name_id');
                $newbed->patient_id = $request->input('patient_name_id');
                $newbed->doctor_id = $request->input('doctor_name_id');
                $newbed->allotment_time = $request->input('appointment_date_id');
                $newbed->discharge_time = $request->input('discharge_date_id');
                $newbed->discription = $request->input('description_id');
                $newbed->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'New bed  Allotment Updated Successfully.'
                ]);  
            }else {
                $newbed = NewBedAllotment::find($id);
                $newbed->new_bed_id = $request->input('bed_name_id');
                $newbed->patient_id = $request->input('patient_name_id');
                $newbed->doctor_id = $request->input('doctor_name_id');
                $newbed->allotment_time = $request->input('appointment_date_id');
                $newbed->discharge_time = $request->input('discharge_date_id');
                $newbed->discription = $request->input('description_id');
                $newbed->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Bed Allotment Updated Successfully.'
                ]);  
            }
        } 

    }
}