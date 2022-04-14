<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Check;
use App\Models\Apointment\Apointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Image;
use Illuminate\Validation\Rules\Password;
use App\Models\DoctorDept;
use DB;
use App\Models\outlet;

// use App\Models\Nurse\Nurse;
// use App\Models\Laboratorist\Laboratorist;
use App\Models\Doctor;
// use App\Models\Patient;
// use App\Models\Pharmacist;
// use App\Models\Receptionist;
// use App\Models\Accountant;
// use App\Models\NewBed;


class DoctorController extends Controller
{
    // method for all patient data
    public function index()
    {


        $doctorDepts = DoctorDept::latest()->get();
        $doctors = Doctor::latest()->get();

        return view('super_admin.doctor.view_doctor', compact('doctors', 'doctorDepts'));
    }

    // method for add doctor page
    public function CreateDoctor()
    {
        $outlets = outlet::latest()->get();
        $doctorDepts = DoctorDept::latest()->get();
        return view('super_admin.doctor.add_doctor', compact('outlets', 'outlets', 'doctorDepts'));
    }

    // method for storing patient data
    public function StoreDoctor(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'last_name1' => 'required',
            'first_name1' => 'required',
            'password' => 'required',
            'mobile' => 'required',
            'sex' => 'required',
            'address1' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    //  'status'=>400,
                    'errors' => $validator->errors()
                ],
                422
            );
        } else {
            //  img upload and save
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/doctor/' . $name_gen);
            $save_url = 'uploads/doctor/' . $name_gen;

            $doctor = new Doctor;

            $doctor->outlet_id = $request->input('outlet_id');
            $doctor->first_name1 = $request->input('first_name1');
            $doctor->last_name1 = $request->input('last_name1');
            $doctor->email = $request->input('email');
            $doctor->password = $request->input('password');
            $doctor->designation = $request->input('designation');
            $doctor->doc_dept = $request->input('doc_dept');
            $doctor->phone = $request->input('phone');
            $doctor->mobile = $request->input('mobile');
            $doctor->sex = $request->input('sex');
            $doctor->profile = $request->input('profile');
            $doctor->dob = $request->input('dob');
            $doctor->address1 = $request->input('address1');
            $doctor->address12 = $request->input('address12');
            $doctor->city = $request->input('city');
            $doctor->zip = $request->input('zip');
            $doctor->specialist = $request->input('specialist');
            $doctor->age = $request->input('age');
            $doctor->blood_group = $request->input('blood_group');
            $doctor->social_link = $request->input('social_link');
            $doctor->career_title = $request->input('career_title');
            $doctor->short_biography = $request->input('short_biography');
            $doctor->long_biography = $request->input('long_biography');
            $doctor->education_degree = $request->input('education_degree');
            $doctor->status = $request->input('status');
            $doctor->image = $save_url;
            $doctor->save();
            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $last3 = DB::table('doctors')->latest('id')->first();
            $last = $last3->id;
            foreach ($first_name as $key => $fn) {
                $data = array(
                    'first_name' => $fn,
                    'last_name' => $last_name[$key],
                    'doctor_name'  => $last
                );
                $insert_data[] = $data;
            }
            //   for($count = 0; $count < count($first_name); $count++)
            //   {
            //       $data = array(
            //           'first_name' => $first_name[$count],
            //           'last_name' => $last_name[$count],
            //           'doctor_name'  => $last
            //       );
            //       $insert_data[] = $data;
            //    }
            Check::insert($insert_data);
            return response()->json([
                'status' => 200,
                'message' => 'Patient Case Study Added Successfully.'
            ]);
        }
    }
    // edit DOctor
    public function EditDoctor($id)
    {
        $DoctorDepts = DoctorDept::orderBy('name', 'ASC')->get();

        $doctors = Doctor::findOrfail($id);

        return view('super_admin.doctor.edit_doctor', compact('doctors', 'DoctorDepts'));
    }
    // update Doctor
    public function UpdateDoctor(Request $request)
    {

        $doctor_id = $request->id;
        $old_img  = $request->old_image;

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'last_name1' => 'required',
            'first_name1' => 'required',
            'password' => 'required',
            'mobile' => 'required',
            'sex' => 'required',
            'address1' => 'required',
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
            $doctor_id = $request->input('id');
            $old_img  = $request->input('old_image');
            if ($request->file('image')) {

                // for image
                unlink($old_img);
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 300)->save('uploads/doctor/' . $name_gen);
                $save_url = 'uploads/doctor/' . $name_gen;
                // $patienr_id=$request->input('id');
                $patient = Doctor::find($doctor_id);
                $patient->first_name1 = $request->input('first_name1');
                $patient->last_name1 = $request->input('last_name1');
                $patient->email = $request->input('email');
                $patient->password = $request->input('password');
                $patient->designation = $request->input('designation');
                $patient->doc_dept = $request->input('doc_dept');
                $patient->phone = $request->input('phone');
                $patient->mobile = $request->input('mobile');
                $patient->sex = $request->input('sex');
                $patient->profile = $request->input('profile');
                $patient->dob = $request->input('dob');
                $patient->address1 = $request->input('address1');
                $patient->address12 = $request->input('address12');
                $patient->city = $request->input('city');
                $patient->zip = $request->input('zip');
                $patient->specialist = $request->input('specialist');
                $patient->age = $request->input('age');
                $patient->blood_group = $request->input('blood_group');
                $patient->social_link = $request->input('social_link');
                $patient->career_title = $request->input('career_title');
                $patient->short_biography = $request->input('short_biography');
                $patient->long_biography = $request->input('long_biography');
                $patient->education_degree = $request->input('education_degree');
                $patient->status = $request->input('status');
                $patient->image = $save_url;
                $patient->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Doctor updated Successfully.'
                ]);
            } else {
                $patient = Doctor::find($doctor_id);
                $patient->first_name1 = $request->input('first_name1');
                $patient->last_name1 = $request->input('last_name1');
                $patient->email = $request->input('email');
                $patient->password = $request->input('password');
                $patient->designation = $request->input('designation');
                $patient->doc_dept = $request->input('doc_dept');
                $patient->phone = $request->input('phone');
                $patient->mobile = $request->input('mobile');
                $patient->sex = $request->input('sex');
                $patient->profile = $request->input('profile');
                $patient->dob = $request->input('dob');
                $patient->address1 = $request->input('address1');
                $patient->address12 = $request->input('address12');
                $patient->city = $request->input('city');
                $patient->zip = $request->input('zip');
                $patient->specialist = $request->input('specialist');
                $patient->age = $request->input('age');
                $patient->blood_group = $request->input('blood_group');
                $patient->social_link = $request->input('social_link');
                $patient->career_title = $request->input('career_title');
                $patient->short_biography = $request->input('short_biography');
                $patient->long_biography = $request->input('long_biography');
                $patient->education_degree = $request->input('education_degree');
                $patient->status = $request->input('status');
                $patient->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Doctor updated Successfully.'
                ]);
            }
        }
    } // method end
    // delete sub category

    // method end
    // delete sub category

    public function DeleteDoctor($id)
    {

        $doctor = Doctor::findOrFail($id);

        $img = $doctor->image;
        unlink($img);

        Doctor::findOrFail($id)->delete();

        $notification = array(
            'message' =>  'Doctor  Deleted Sucessyfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end method


    // all doctor view in dashboard
    public function AllDoctorView()
    {

        $listdoctors = Doctor::latest()->get();
        return view('super_admin.doctor.list_doctor', compact('listdoctors'));
    }


    // single doctor view in dashboard
    public function SingleDoctorView($id)
    {
        $doctor = Doctor::find($id);

        $appointments = Apointment::where('doctor_id', $id)->count();
        $appointmentsAll = Apointment::where('doctor_id', $id)->get();
        // dd($appointmentsAll);
        return view('super_admin.doctor.single_doctor', compact('doctor', 'appointments', 'appointmentsAll'));
    }

    // // for doctor dashboard view
    public function DashboardView()
    {
        return view('Dashboards.doctor');
    }
}
