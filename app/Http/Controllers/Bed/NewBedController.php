<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewBedType;
use App\Models\NewBed;
use Illuminate\Support\Facades\Validator;
use Auth;

class NewBedController extends Controller
{

    // New Bed type View
    public function NewBedTypeView()
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $newbedtypes = NewBedType::latest()->where('outlet_id', $auth_id)->get();
        return View('Bed.view_newbed_type', compact('newbedtypes'));
    } // end method

    // new bed type store
    public function NewBedTypeStore(Request $request)
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;

        $validator = Validator::make($request->all(), [
            'bed_types' => 'required|max:191',
            'description' => 'required|max:191',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $student = new NewBedType;
            $student->outlet_id = $auth_id;
            $student->bed_types = $request->input('bed_types');
            $student->description = $request->input('description');
            $student->save();
            return response()->json([
                'status' => 200,
                'message' => 'Student Added Successfully.'
            ]);
            $notification = array(
                'message' =>  'New Bed Added Successfuly',
                'alert-type' => 'success'
            );
        }
    } // end mathod


    // new bed type edit data
    public function NewBedTypeEdit($id)
    {
        $newbedtype = NewBedType::find($id);
        if ($newbedtype) {
            return response()->json([
                'status' => 200,
                'newbedtype' => $newbedtype,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No newbedtype Found.'
            ]);
        }
    }

    // new bed type update data
    public function NewBedTypeUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'bed_types' => 'required|max:191',
            'description' => 'required|max:191',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $student = NewBedType::find($id);
            if ($student) {
                $student->bed_types = $request->input('bed_types');
                $student->description = $request->input('description');
                $student->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'New Bed Type Updated Successfully.'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No Student Found.'
                ]);
            }
        }
    }


    // delete bedtype
    public function NewBedTypeDelete($id)
    {

        $newbedtype = NewBedType::findOrFail($id);
        NewBedType::findOrFail($id)->delete();
        return redirect()->back();
    }


    // /////////////////////////For New Bed/////////////////////////////////////

    // New Bed View start
    public function NewBedView()
    {
        $newbedtypes = NewBedType::orderBy('bed_types', 'ASC')->get();
        $newbeds = NewBed::latest()->get();

        return View('Bed.view_new_bed', compact('newbeds', 'newbedtypes'));
    } // end method

    // new bed View store
    public function NewBedStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'bed'=> 'required',
            'bed_type_id' => 'required',
            'charge' => 'required|numeric',
            'description' => 'required|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $student = new NewBed;
            $student->bed = $request->input('bed');
            $student->new_bed_type_id = $request->input('bed_type_id');
            $student->charge = $request->input('charge');
            $student->description = $request->input('description');
            $student->save();
            return response()->json([
                'status' => 200,
                'message' => 'New bed Added Successfully.'
            ]);
            $notification = array(
                'message' =>  'New Bed Added Successfuly',
                'alert-type' => 'success'
            );
        }
    } // end mathod


    // new bed edit data
    public function NewBedEdit($id)
    {
        $newbed = NewBed::find($id);
        $newbedtypes = NewBedType::orderBy('bed_types', 'ASC')->get();
        return response()->json([
            'status' => 200,
            'newbed' => $newbed,
            'newbedtypes' => $newbedtypes,
        ]);
    }



    //new bed updating data
    public function NewBedUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'bed' => 'required',
            'bed_type_id' => 'required',
            'charge' => 'required|numeric',
            'description' => 'required|max:191',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $student = NewBed::find($id);
            if ($student) {
                $student->bed = $request->input('bed');
                $student->new_bed_type_id = $request->input('bed_type_id');
                $student->charge = $request->input('charge');
                $student->description = $request->input('description');
                $student->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'New Bed  Updated Successfully.'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No  New Bed Found.'
                ]);
            }
        }
    }

    // new bed delete data
    public function NewBedDelete($id)
    {

        $newbed = NewBed::findOrFail($id);
        NewBed::findOrFail($id)->delete();
        return redirect()->back();
    } //end method

}
