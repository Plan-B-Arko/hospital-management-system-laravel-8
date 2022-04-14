<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Auth;

class AccountantController extends Controller
{
    // method for all patient data
    public function AccountantView()
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $accountants = Employee::latest()->where('outlet_id', $auth_id)->where('user_role', 'Accountant')->get();
        return view('super_admin.accountant.view_accountant', compact('accountants'));
    }

    // method for editing patient data
    public function AccountEdit($id)
    {
        $accountants = Employee::find($id);
        return response()->json([
            'status' => 200,
            'accountant' => $accountants,
        ]);
    }

    // method for updating data
    public function AccountUpdate(Request $request)
    {
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
                $employee_id = $request->input('accountant_id');
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
                    'message' => 'Accountant Updated Successfully.'
                ]);
            } else {
                $employee_id = $request->input('accountant_id');
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
                    'message' => 'Accountant Updated Successfully.'
                ]);
            }
        }
    }

    // method for deleting patient data
    public function AccountDelete($id)
    {

        $accountant = Employee::findOrFail($id);
        if ($accountant->image) {
            $img = $accountant->image;
            unlink($img);
        }

        Employee::findOrFail($id)->delete();
        $notification = array(
            'message' =>  'Accountant Deleted Sucessfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    // all acountant list in dashboard
    public function ListAccountView()
    {
        $listaccountants = Accountant::latest()->get();
        return view('super_admin.accountant.list_accountant', compact('listaccountants'));
    }
}
