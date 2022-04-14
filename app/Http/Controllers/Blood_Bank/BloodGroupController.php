<?php

namespace App\Http\Controllers\Blood_Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blood_Bank\BloodGroup;
use Auth;

use Illuminate\Support\Facades\Validator;


class BloodGroupController extends Controller
{

    // blood group view start
    public function BloodGroupView()
    {

        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $bloodgroups = BloodGroup::where('outlet_id', $auth_id)->get();
        dd($bloodgroups);

        return view('Blood_Bank.view_blood_group', compact('bloodgroups'));
    }

    // blood group store start
    public function BloodGroupStore(Request $request)
    {

        $auth_id = Auth::guard('admin')->user()->outlet_id;

        $validator = Validator::make($request->all(), [
            'blood_group' => 'required',
            'bags' => 'required|numeric',
        ], [
            'blood_group.required' => 'Blood Group is required',
            'bags.required' => 'Bag number is required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $bloodgroup = new BloodGroup;
            $bloodgroup->outlet_id = $auth_id;
            $bloodgroup->blood_group = $request->input('blood_group');
            $bloodgroup->remained_bags = $request->input('bags');
            $bloodgroup->save();
            return response()->json([
                'status' => 200,
                'message' => 'Blood Group Added Successfuly',
            ]);
        }
    }

    // blood group edit start
    public function BloodGroupedit($id)
    {
        $bloodgroup = BloodGroup::find($id);
        return response()->json([
            'status' => 200,
            'bloodgroup' => $bloodgroup,
        ]);
    }

    // blood group update start
    public function BloodGroupUpdate(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'bags' => 'required|numeric',
        ], [
            'bags.required' => 'Bag number is required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $bloodgroup = BloodGroup::find($id);
            $bloodgroup->blood_group = $request->input('blood_group');
            $bloodgroup->remained_bags = $request->input('bags');
            $bloodgroup->update();
            return response()->json([
                'status' => 200,
                'message' => 'Blood Group updated Successfuly',
            ]);
        }
    }

    // blood group delete start
    public function BloodGroupDelete($id)
    {
        $bloodgroup = BloodGroup::find($id);
        $bloodgroup->delete();
        return redirect()->back();
    }
}
