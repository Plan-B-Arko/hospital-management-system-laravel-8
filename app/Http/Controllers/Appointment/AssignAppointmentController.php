<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apointment\Apointment;
use App\Models\Doctor;

class AssignAppointmentController extends Controller
{
    // all appointment show between dates
    public function AssignByAll()
    {
        $appointments = Apointment::with('patient', 'doctorDept', 'doctor')->get();
        return view('Appointment.appointment_assign_all', compact('appointments'));
    }

    // all appointment show between dates ajax filter
    public function SearchAssignByAll(Request $request)
    {
        $start = $request->starting_date;
        $end = $request->ending_date;
        $appointments  = Apointment::with('doctor', 'doctorDept', 'patient')->whereBetween('appointment_date', [$start, $end])->get();
        return response()->json($appointments);
    }

    // all apointment show between dates by specific doctor
    public function AssignToDoctor()
    {
        $appointments = Apointment::with('patient', 'doctorDept', 'doctor')->get();
        $doctors = Doctor::all();
        return view('Appointment.appointment_assign_to_doctor', compact('appointments', 'doctors'));
    }

    // all apointment show between dates by specific doctor ajax filter
    public function AssignToDoctorFilter(Request $request, $id)
    {

        $start = $request->starting_date;
        $end = $request->ending_date;
        $appointments  = Apointment::with('doctor', 'doctorDept', 'patient')
            ->where('doctor_id', $id)
            ->whereBetween('appointment_date', [$start, $end])
            ->get();
        return response()->json($appointments);
    }
}
