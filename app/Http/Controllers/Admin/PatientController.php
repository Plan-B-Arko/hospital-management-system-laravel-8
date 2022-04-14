<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Image;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;


class PatientController extends Controller
{
    // method for all patient data
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $auth_id = Auth::guard('admin')->user()->outlet_id;
        } elseif (Auth::guard('doctor')->check()) {
            $auth_id = Auth::guard('doctor')->user()->outlet_id;
        }
        $patients = Patient::where('outlet_id', $auth_id)->get();
        return view('super_admin.patient.view_patient', compact('patients'));
    }

    // method for storing patient data
    public function StorePatient(Request $request)
    {
        // fgdg
        if (Auth::guard('admin')->check()) {

            $auth_id = Auth::guard('admin')->user()->outlet_id;
        } elseif (Auth::guard('doctor')->check()) {
            $auth_id = Auth::guard('doctor')->user()->outlet_id;
        }

        $validator = Validator::make($request->all(), [
            'fname' => 'required|max:100',
            'email' => 'required|unique:patients|email',
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->numbers()
            ],
            'address' => 'required',
            'phone' => 'required|numeric|digits_between: 1,11',
            'dob' => 'required',
            'blood_group' => 'required',
            'gender' => 'required',
            'age' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {

            $fname = $request->fname . " " . $request->lname;
            if ($request->file('image')) {
                $patient = new Patient;
                $patient->outlet_id = $auth_id;
                /** Generate id */
                $patient_id = Helper::IDGenerator(new Patient, 'patient_id', 2, 'PTD');
                $patient->patient_id = $patient_id;
                $patient->name = $fname;
                $patient->email = $request->input('email');
                $patient->password = Hash::make($request->input('password'));
                $patient->address = $request->input('address');
                $patient->address2 = $request->input('address2');
                $patient->phone = $request->input('phone');
                $patient->mobile = $request->input('mobile');
                $patient->sex = $request->input('gender');
                $patient->city = $request->input('city');
                $patient->facebook = $request->input('facebook');
                $patient->twitter = $request->input('twitter');
                $patient->zip = $request->input('zip');
                $patient->dob = $request->input('dob');
                $patient->age = $request->input('age');
                $patient->blood_group = $request->input('blood_group');
                $file = $request->file('image');
                $extension = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize(300, 300)->save('uploads/patient/' . $extension);
                $save_url = 'uploads/patient/' . $extension;
                $patient->image = $save_url;
                // $patient->created_at =  $date->format('d-m-y h:i:s' );
                $patient->created_at = Carbon::now()->timezone('CST');
                $patient->save();
                return response()->json([
                    'status' => 200,
                    'patientId' => $patient_id,
                    'message' => 'Patient Added Successfully.'
                ]);
            } else {
                $patient = new Patient;
                /** Generate id */
                $patient_id = Helper::IDGenerator(new Patient, 'patient_id', 2, 'PTD');
                $patient->patient_id = $patient_id;
                $patient->outlet_id = $auth_id;
                $patient->name = $fname;
                $patient->email = $request->input('email');
                $patient->password = Hash::make($request->input('password'));
                $patient->address = $request->input('address');
                $patient->address2 = $request->input('address2');
                $patient->phone = $request->input('phone');
                $patient->mobile = $request->input('mobile');
                $patient->sex = $request->input('gender');
                $patient->city = $request->input('city');
                $patient->facebook = $request->input('facebook');
                $patient->twitter = $request->input('twitter');
                $patient->zip = $request->input('zip');
                $patient->dob = $request->input('dob');
                $patient->age = $request->input('age');
                $patient->blood_group = $request->input('blood_group');
                $patient->created_at = Carbon::now()->timezone('CST');
                $patient->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Patient Added Successfully.'
                ]);
            }
        }
    }

    // method for editing patient data
    public function EditPatient($id)
    {
        $patient = Patient::find($id);
        return response()->json([
            'status' => 200,
            'patient' => $patient,
        ]);
    }

    // method for updating data
    public function UpdatePatient(Request $request)
    {
        // vjhv
        if (Auth::guard('admin')->check()) {

            $auth_id = Auth::guard('admin')->user()->outlet_id;
        } elseif (Auth::guard('doctor')->check()) {
            $auth_id = Auth::guard('doctor')->user()->outlet_id;
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required|numeric|digits_between: 1,11',
            'dob' => 'required',
            'bloodgrp' => 'required',
            'gender1' => 'required',
            'age' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            if ($request->file('image')) {
                $old_img  = $request->old_image;
                unlink($old_img);
                $file = $request->file('image');
                $extension = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize(300, 300)->save('uploads/patient/' . $extension);
                $save_url = 'uploads/patient/' . $extension;
                $patient_id = $request->input('patient_id');
                $patient = Patient::find($patient_id);
                $patient->outlet_id = $auth_id;
                $patient->name = $request->input('name');
                $patient->email = $request->input('email');
                $patient->address = $request->input('address');
                $patient->phone = $request->input('phone');
                $patient->sex = $request->input('gender1');
                $patient->dob = $request->input('dob');
                $patient->age = $request->input('age');
                $patient->image = $save_url;
                $patient->blood_group = $request->input('bloodgrp');
                $patient->updated_at = Carbon::now()->timezone('CST');
                $patient->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Patient Updated Successfully.'
                ]);
            } else {
                $patient_id = $request->input('patient_id');
                $patient = Patient::find($patient_id);
                $patient->outlet_id = $auth_id;
                $patient->name = $request->input('name');
                $patient->email = $request->input('email');
                $patient->address = $request->input('address');
                $patient->phone = $request->input('phone');
                $patient->sex = $request->input('gender1');
                $patient->dob = $request->input('dob');
                $patient->age = $request->input('age');
                $patient->updated_at = Carbon::now()->timezone('CST');
                $patient->blood_group = $request->input('bloodgrp');
                $patient->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Patient Updated Successfully.'
                ]);
            }
        }
    }

    // method for deleting patient data
    public function DeletePatient($id)
    {
        $patient = Patient::findOrFail($id);
        if ($patient->image) {
            $img = $patient->image;
            unlink($img);
        }
        Patient::findOrFail($id)->delete();
        $notification = array(
            'message' =>  'Patient Delete Sucessyfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    // all patient view in dashboard
    public function AllPatientView()
    {
        $listpatients = Patient::latest()->get();
        return view('super_admin.patient.list_patient', compact('listpatients'));
    }
}
