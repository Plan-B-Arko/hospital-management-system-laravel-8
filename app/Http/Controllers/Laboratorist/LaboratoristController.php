<?php

namespace App\Http\Controllers\Laboratorist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use Image;
use Auth;

class LaboratoristController extends Controller
{
    // method for all laboratorist data
    public function LaboratoristView()
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $laboratorists = Employee::latest()->where('outlet_id', $auth_id)->where('user_role', 'Laboratorist')->get();
        return view('super_admin.laboratorist.view_laboratorist', compact('laboratorists'));
    }


    // method for editing laboratorist data
    public function LaboratoristEdit($id)
    {
        $laboratorist = Employee::find($id);
        return response()->json([
            'status' => 200,
            'laboratorist' => $laboratorist,
        ]);
    }

    // method for updating laboratorist data
    public function LaboratoristUpdate(Request $request)
    {
        // dd($request->input('laboratorist_id'));
        $validator = Validator::make($request->all(), [
            'user_role' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric|digits_between: 1,11',
            'gender1' => 'required',
            'address' => 'required',
            'status' => 'required',
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
                $employee_id = $request->input('laboratorist_id');
                $employee = Employee::find($employee_id);
                $employee->user_role = $request->input('user_role');
                $employee->name = $request->input('name');
                $employee->email = $request->input('email');
                $file = $request->file('image');
                $extension = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize(300, 300)->save('uploads/employee/' . $extension);
                $save_url = 'uploads/employee/' . $extension;
                $employee->image = $save_url;
                $employee->mobile = $request->input('mobile');
                $employee->gender = $request->input('gender1');
                $employee->address = $request->input('address');
                $employee->status = $request->input('status');
                $employee->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Employee Added Successfully.'
                ]);
            } else {
                $employee_id = $request->input('laboratorist_id');
                $employee = Employee::find($employee_id);
                $employee->user_role = $request->input('user_role');
                $employee->name = $request->input('name');
                $employee->email = $request->input('email');
                $employee->mobile = $request->input('mobile');
                $employee->gender = $request->input('gender1');
                $employee->address = $request->input('address');
                $employee->status = $request->input('status');
                $employee->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Employee Added Successfully.'
                ]);
            }
        }
    }

    // method for deleting laboratorist data
    public function LaboratoristDelete($id)
    {

        $employee = Employee::findOrFail($id);
        if ($employee->image) {
            $img = $employee->image;
            unlink($img);
        }

        Employee::findOrFail($id)->delete();
        $notification = array(
            'message' =>  'Laboratorist Deleted Sucessfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    // all laboratorist view in dashboard
    public function ListlaboratoristView()
    {
        $listlaboratorists = Laboratorist::latest()->get();
        return view('super_admin.laboratorist.list_laboratorist', compact('listlaboratorists'));
    }
}
