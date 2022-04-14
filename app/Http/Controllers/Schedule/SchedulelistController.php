<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule\Schedulelist;
use App\Models\Schedule\Schedule;
use App\Models\Doctor;
use Illuminate\Support\Facades\Validator;
use Auth;

class SchedulelistController extends Controller
{
    //
    //
    public function ViewTimeSlotlist()

    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $docnames = Doctor::where('outlet_id', $auth_id)->get();
        $slotsnames = Schedule::where('outlet_id', $auth_id)->get();
        $schedulists = Schedulelist::where('outlet_id', $auth_id)->get();

        //  dd($schedulists);
        return view('super_admin.schedule.view_schedulelist', compact('schedulists', 'slotsnames', 'docnames'));
    }
    // new time slot store
    public function StoreTimeSlotlist(Request $request)
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $validator = Validator::make($request->all(), [
            'slot_id' => 'required',
            'doctor_id' => 'required',
            'available_days' => 'required',
            'available_time_start' => 'required',
            'available_time_end' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $diagnosis = new Schedulelist;
            $diagnosis->outlet_id = $auth_id;
            $diagnosis->slot_id = $request->input('slot_id');
            $diagnosis->doctor_id = $request->input('doctor_id');
            $diagnosis->available_days = $request->input('available_days');
            $diagnosis->available_time_start = $request->input('available_time_start');
            $diagnosis->available_time_end = $request->input('available_time_end');
            $diagnosis->per_patient_time = $request->input('per_patient_time');
            $diagnosis->serial_visiability = $request->input('serial_visiability');
            $diagnosis->available_days = $request->input('available_days');
            $diagnosis->status = $request->input('status');
            $diagnosis->save();
            return response()->json([
                'status' => 200,
                'message' => 'Time Slot added Successfully.'
            ]);
            $notification = array(
                'message' =>  'Time Slot  added Successfuly',
                'alert-type' => 'success'
            );
        }
    } // end method

    // new diagnosis category edit
    public function EditTimeSlotlist($id)
    {
        $diagnosiscat = Schedulelist::find($id);

        //    dd($diagnosiscat);
        if ($diagnosiscat) {
            return response()->json([
                'status' => 200,
                'diagnosiscat' => $diagnosiscat,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No diagnosis Found.'
            ]);
        }
    }


    //  //  new diagnosis category update
    public function UpdateTimeSlotlist(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            //   'slot_id'=> 'required',
            //   'doctor_id'=>'required',
            //   'status'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $diagnosis = Schedulelist::find($id);
            if ($diagnosis) {
                $diagnosis->slot_id = $request->input('slot_id');
                $diagnosis->doctor_id = $request->input('doctor_id');
                $diagnosis->available_days = $request->input('available_days');
                $diagnosis->available_time_start = $request->input('available_time_start');
                $diagnosis->available_time_end = $request->input('available_time_end');
                $diagnosis->per_patient_time = $request->input('per_patient_time');
                $diagnosis->serial_visiability = $request->input('serial_visiability');
                $diagnosis->available_days = $request->input('available_days');
                $diagnosis->status = $request->input('status');
                $diagnosis->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'ScheduleList Updated Successfully.'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No Schedule List Found.'
                ]);
            }
        }
    }

    //diagnosis category delete
    public function DeleteTimeSlot($id)
    {
        $diagnosis = Schedulelist::findOrFail($id);
        Schedulelist::findOrFail($id)->delete();
        return redirect()->back();
    } //end method
}
