<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Check;
use Validator;

class LanguageController extends Controller
{
    //
    public function indexx()
    {
     return view('language');
    }

    public function insertt(Request $request)
    {
     if($request->ajax())
     {
      $rules = array(
       'first_name.*'  => 'required',
       'last_name.*'  => 'required'
      );
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json([
        'error'  => $error->errors()->all()
       ]);
      }
      $doctor_name = $request->doctor_name;
      $first_name = $request->first_name;
      $last_name = $request->last_name;
      for($count = 0; $count < count($first_name); $count++)
      {
       $data = array(
        'doctor_name' => $doctor_name[$count],
        'first_name' => $first_name[$count],
        'last_name'  => $last_name[$count],
        
       );
       $insert_data[] = $data; 
      }

      Check::insert($insert_data);
      return response()->json([
       'success'  => 'Data Added successfully.'
      ]);
     }
    }

}
