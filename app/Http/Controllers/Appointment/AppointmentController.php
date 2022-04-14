<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Apointment\Apointment;
use App\Models\DoctorDept;
use App\Models\Schedule\Schedulelist;
use Carbon\carbon;
use App\Models\Event;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // apointment calender view page
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Apointment::join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
                ->select('appointments.id as id', 'appointments.date as date', 'doctors.name as title')
                ->get();
            return response()->json($data);
        }
        return view('Appointment.appointment_calender');
    }

    // for adding in appointment
    public function AppointmentView()
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $docdepts = DoctorDept::where('outlet_id', $auth_id)->get();
        return view('Appointment.appointment_view', compact('docdepts'));
    }

    // for getting doctors free schedule
    public function SlotName($doctor_name)
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $scheduleList = Schedulelist::where('doctor_id', $doctor_name)->where('outlet_id', $auth_id)->get();
        return response()->json($scheduleList);
    }

    // for getting serial number by date
    public function SerialDate($date, $id)
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $date = Carbon::createFromFormat('Y-m-d', $date)->format('l');
        $serialNumber = Schedulelist::where('doctor_id', $id)->where('available_days', $date)->where('outlet_id', $auth_id)->first();
        return response()->json([
            'status' => 200,
            'id' => $id,
            'serialNumber' => $serialNumber,
            'message' => 'Serial Number'
        ]);
    }

    // apoointment store start
    public function AppointmentStore(Request $request)
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        // validation
        $request->validate([
            'patient_id' => 'required',
            'department_name' => 'required',
            'doctor_name' => 'required',
            'appointment_date' => 'required',
            'AppointmentSerial' => 'required',
            'status' => 'required',
        ], [
            'department_name.required' => 'Input The Department Name',
            'doctor_name.required' => 'Input The Doctor Name',
        ]);

        $appointment_id = Helper::IDGenerator(new Apointment, 'appointment_id', 2, 'APT');
        /** Generate id */

        // Apointment Insert
        Apointment::insert([
            'appointment_id' => $appointment_id,
            'outlet_id' =>  $auth_id,
            'patient_id' => $request->patient_id,
            'doctorDept_id' => $request->department_name,
            'doctor_id' => $request->doctor_name,
            'appointment_date' => $request->appointment_date,
            'serial_no' => $request->AppointmentSerial,
            'problem' => $request->problem,
            'status' => $request->status,
        ]);

        $notification = array(
            'message' =>  'Appointment Added Sucessfully',
            'alert-type' => 'success'
        );

        return redirect('/Appointment/view/all')->with($notification);
    }

    // appointment delete
    public function AppointmentDelete($id)
    {
        Apointment::findOrFail($id)->delete();
        $notification = array(
            'message' =>  'Appointment Added Sucessfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // checking if patient exist or not using ajax
    public function PatientName($name)
    {
        $patient = Patient::where('patient_id', 'like', $name)->first();
        return response()->json($patient);
    }

    //doctor name by department
    public function DeptDoctor($id)
    {
        $deptDocs = Doctor::where('doc_dept', $id)->get();
        return response()->json($deptDocs);
    }

    public function AppointmentViewAll()
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $appointments = Apointment::with('patient', 'doctorDept', 'doctor')->where('outlet_id', $auth_id)->get();
        return view('Appointment.appointment_all', compact('appointments'));
    }


    public function getAppointmentsViaDoctor($doctor_id)
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $apointments  =  Apointment::where('doctor_id', $doctor_id)->where('outlet_id', $auth_id)->pluck('serial_no');
        return response()->json(compact('apointments'));
    }
}
