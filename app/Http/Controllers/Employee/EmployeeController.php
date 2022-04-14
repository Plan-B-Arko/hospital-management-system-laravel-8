<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class EmployeeController extends Controller
{
    public function AddEmployee()
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        return view('employee.add_employee');
    }

    public function EmployeeStore(Request $request)
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $validator = Validator::make($request->all(), [
            'user_role' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:employees|email',
            'password' => 'required| min:6| max:12 |confirmed',
            'password_confirmation' => 'required| min:6',
            'mobile' => 'required|numeric',
            'gender' => 'required',
            'image'  => 'required',
            'address' => 'required',
            'status' => 'required',
        ], [
            'fname.required' => 'The first name field is required',
            'lname.required' => 'The last name field is required',
            'password.confirmed' => 'password confirmation not matched'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            if ($request->file('image')) {
                $employee = new Employee;
                $employee->outlet_id = $auth_id;
                $employee->user_role = $request->input('user_role');
                $employee->name = $request->input('fname') . ' ' . $request->input('lname');
                $employee->email = $request->input('email');
                $employee->password = Hash::make($request->input('password'));
                $file = $request->file('image');
                $extension = hexdec(uniqid()) . ' ' . $file->getClientOriginalExtension();
                Image::make($file)->resize(300, 300)->save('uploads/employee/' . $extension);
                $save_url = 'uploads/employee/' . $extension;
                $employee->image = $save_url;
                $employee->mobile = $request->input('mobile');
                $employee->gender = $request->input('gender');
                $employee->address = $request->input('address');
                $employee->status = $request->input('status');
                $employee->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Employee Added Successfully.'
                ]);
            } else {
                $employee = new Employee;
                $employee->outlet_id = $auth_id;
                $employee->user_role = $request->input('user_role');
                $employee->name = $request->input('fname') . ' ' . $request->input('lname');
                $employee->email = $request->input('email');
                $employee->password = Hash::make($request->input('password'));
                $employee->mobile = $request->input('mobile');
                $employee->gender = $request->input('gender');
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
}
