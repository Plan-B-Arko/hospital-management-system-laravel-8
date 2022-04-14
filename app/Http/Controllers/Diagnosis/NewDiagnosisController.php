<?php

namespace App\Http\Controllers\Diagnosis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diagnosis\Diagnosis;
use Illuminate\Support\Facades\Validator;
use Auth;

class NewDiagnosisController extends Controller
{

    // New diagnosis category View
    public function DiagnosisCategoryView()
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $diagnosiscats = Diagnosis::latest()->where('outlet_id', $auth_id)->get();
        return View('Diagnosis.view_diagnosiscategory', compact('diagnosiscats'));
    } // end method

    // new Diagnosis category store
    public function DiagnosisCategoryStore(Request $request)
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;

        $validator = Validator::make($request->all(), [
            'new_diagnosis_category' => 'required|max:10',
            'description' => 'required|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $diagnosis = new Diagnosis;
            $diagnosis->outlet_id = $auth_id;

            $diagnosis->new_diagnosis_category = $request->input('new_diagnosis_category');
            $diagnosis->description = $request->input('description');
            $diagnosis->save();
            return response()->json([
                'status' => 200,
                'message' => 'Diagnosis category added Successfully.'
            ]);
            $notification = array(
                'message' =>  'Diagnosis category aaded Successfuly',
                'alert-type' => 'success'
            );
        }
    } // end method

    // new diagnosis category edit
    public function DiagnosisCategoryEdit($id)
    {
        $diagnosiscat = Diagnosis::find($id);
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


    //  new diagnosis category update
    public function DiagnosisCategoryUpdate(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'new_diagnosis_category' => 'required|max:10',
            'description' => 'required|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $diagnosis = Diagnosis::find($id);
            if ($diagnosis) {
                $diagnosis->new_diagnosis_category = $request->input('new_diagnosis_category');
                $diagnosis->description = $request->input('description');
                $diagnosis->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Diagnosis Updated Successfully.'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No Diagnosis Found.'
                ]);
            }
        }
    }

    //diagnosis category delete
    public function DiagnosisCategoryDelete($id)
    {
        Diagnosis::findOrFail($id)->delete();
        return redirect()->back();
    } //end method

}
