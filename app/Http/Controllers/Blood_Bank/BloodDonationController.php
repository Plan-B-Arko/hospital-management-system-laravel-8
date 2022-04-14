<?php

namespace App\Http\Controllers\Blood_Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blood_Bank\BloodDonation;
use App\Models\Blood_Bank\BloodDonor;
use Illuminate\Support\Facades\Validator;
use Auth;

class BloodDonationController extends Controller
{

    // Blood Donation View
    public function BloodDonationView()
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $blooddonors = BloodDonor::orderBy('name', 'ASC')->where('outlet_id', $auth_id)->get();
        $blooddonations = BloodDonation::latest()->get();
        return view('Blood_Bank.view_blood_donation', compact('blooddonors', 'blooddonations'));
    } // end method


    // Blood Donation store
    public function BloodDonationStore(Request $request)
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;

        $validator = Validator::make($request->all(), [
            'donor_id' => 'required',
            'bags' => 'required|numeric',
        ], [
            'donor_id.required' => 'Donor name is required',
            'bags.required' => 'Bag number is required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $blooddonation = new BloodDonation;
            $blooddonation->outlet_id = $auth_id;
            $blooddonation->donor_id = $request->input('donor_id');
            $blooddonation->bags = $request->input('bags');
            $blooddonation->save();
            return response()->json([
                'status' => 200,
                'message' => 'Donor Added Successfuly',
            ]);
        }
    } // end mathod

    // blood donation edit
    public function BloodDonationEdit($id)
    {
        $blooddonors = BloodDonor::orderBy('name', 'ASC')->get();
        $blooddonation = BloodDonation::find($id);
        return response()->json([
            'status' => 200,
            'blooddonors' => $blooddonors,
            'blooddonation' => $blooddonation,
        ]);
    } //end edit of blood donation


    // blood donation update
    public function BloodDonationUpdate(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'donor_id' => 'required',
            'bags' => 'required|numeric',
        ], [
            'donor_id.required' => 'Donor name is required',
            'bags.required' => 'Bag number is required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $blooddonation = BloodDonation::find($id);
            if ($blooddonation) {
                $blooddonation->donor_id = $request->donor_id;
                $blooddonation->bags = $request->bags;
                $blooddonation->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Blood Donation Updated Successfully.'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Blood Donation type Found.'
                ]);
            }
        }
    }

    //   blood donation delete
    public function BloodDonationDelete($id)
    {
        BloodDonation::findOrFail($id)->delete();
        return redirect()->back();
    }
}
