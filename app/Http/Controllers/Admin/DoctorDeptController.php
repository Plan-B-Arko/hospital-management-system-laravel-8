<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoctorDept;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class DoctorDeptController extends Controller
{
     // method for all doctor department data 
    public function index(){
        $doctorDepts = DoctorDept::latest()->get();
        return view('super_admin.doctor.view_doctor_dept',compact('doctorDepts'));
    }

    // method for storing all department data
    public function StoreDoctorDept(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:256', 
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else{
            $doctorDepts=new DoctorDept;
            $doctorDepts->name=$request->input('name');
            $doctorDepts->description=$request->input('description');
            $doctorDepts->save();
            return response()->json([
                'status'=>200,
                'message'=>'Doctor Department Added Successfully.'
            ]);
        }
    } 

    // method for deleting doctor department data
    public function DeleteDoctorDept($id){
            DoctorDept::findOrFail($id)->delete();
            $notification = array(
                'message' =>  'Doctor Department Deleted Sucessfully',
                'alert-type' => 'info'
            ); 
            return redirect()->back()->with($notification);
    }   

    // method for editing doctor department data
   public function EditDoctorDept($id){
        $doctorDepts = DoctorDept::find($id);
        return response()->json([
            'status' =>200,
            'doctorDepts' => $doctorDepts,
        ]);
    } 

    // method for updating data
   public function UpdateDoctorDept(Request $request){
    //    dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
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
            $doctorDept = DoctorDept::find($request->input('dept_id'));
            $doctorDept->name = $request->input('name');
            $doctorDept->description=$request->input('description');
            $doctorDept->update();
            return response()->json([
                'status'=>200,
                'message'=>'Doctor Department Updated Successfully.'
            ]);
        } 
    }
}