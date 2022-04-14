<?php

namespace App\Http\Controllers\Medicine;

use App\Http\Controllers\Controller;
use App\Models\Medicine\Box_size;
use Illuminate\Http\Request;
use App\Models\Medicine\MedicineList;
use App\Models\Medicine\MedicineCategory;
use App\Models\Medicine\Medicine_manufacture;
use App\Models\Medicine\Medicine;
use App\Models\Medicine\Unit;
use Image;
use Auth;
use Illuminate\Support\Facades\Validator;


class MedicineListController extends Controller
{
    //

     // Medicine List View
     public function MedicineListView(){
        if(Auth::guard('admin')->check()){
           
             $auth_id = Auth::guard('admin')->user()->outlet_id;
        }
        elseif(Auth::guard('doctor')->check()){
            $auth_id = Auth::guard('doctor')->user()->outlet_id;
        }

        $medicine_boxs = Box_size::orderBy('box_size_name', 'DESC')->get();
        $medicine_units = Unit::orderBy('unit_name', 'DESC')->get();
        $medicine_cat = MedicineCategory::orderBy('name', 'ASC')->where('outlet_id', $auth_id)->get();
        $medicine_type = Medicine::orderBy('name', 'ASC')->where('outlet_id', $auth_id)->get();
 
        $medicine_manufacture = Medicine_manufacture::orderBy('name', 'ASC')->get();
        $medicinelsts= MedicineList::with('Medicinecategory','Medicinetype','MedicineManufacture')->get();

        // dd($medicinelsts);

        return View('Medicine.view_medicine_list', compact('medicinelsts','medicine_manufacture','medicine_type','medicine_cat','medicine_boxs','medicine_units'));

    }// end method

     // Medicine List store
      public function MedicineListStore(Request $request){
           if(Auth::guard('admin')->check()){
           
             $auth_id = Auth::guard('admin')->user()->outlet_id;
            }
            elseif(Auth::guard('doctor')->check()){
                $auth_id = Auth::guard('doctor')->user()->outlet_id;
            }

       $validator = Validator::make($request->all(), [
        'name' => 'required|max:100',
        'status' => 'required',
    ]);
    if($validator->fails())
    {
        return response()->json([
            'status'=>400,
            'errors'=>$validator->messages()
        ]);
    }
    else{
        
        if ($request->file('image')) {
        $medicinelist=new MedicineList;
        $medicinelist->outlet_id=$auth_id ;
        $medicinelist->bar_code=$request->input('bar_code');
        $medicinelist->medicine_name=$request->input('name');
        $medicinelist->strength=$request->input('strength');
        $medicinelist->generic_name=$request->input('gen_name');
        $medicinelist->box_size=$request->input('box_size_id');
        $medicinelist->unit=$request->input('unit_id');
        $medicinelist->shelf=$request->input('shelf');
        $medicinelist->medicine_details=$request->input('med_details');
        $medicinelist->category=$request->input('category_id');
        $medicinelist->price=$request->input('price');
        $medicinelist->medicine_type=$request->input('type_id');
        $medicinelist->manufacturer=$request->input('manufacture_id');
        $medicinelist->manufacturer_price=$request->input('menu_price');
        $medicinelist->vat=$request->input('vat');
        $medicinelist->igta=$request->input('gta');
        $medicinelist->status=$request->input('status');
        // image
        $file = $request->file('image');
        $extension = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(300,300)->save('uploads/medicine/'.$extension);
        $save_url = 'uploads/medicine/'.$extension;
        $medicinelist->image= $save_url;
        $medicinelist->save();
        return response()->json([
           'status'=>200,
           'message'=>'medicine Added Successfully.'
       ]);
    }
    else{
        if(Auth::guard('admin')->check()){
           
             $auth_id = Auth::guard('admin')->user()->outlet_id;
        }
        elseif(Auth::guard('doctor')->check()){
            $auth_id = Auth::guard('doctor')->user()->outlet_id;
        }
      
        $medicinelist=new MedicineList;
        $medicinelist->outlet_id=$auth_id ;
        $medicinelist->bar_code=$request->input('bar_code');
        $medicinelist->medicine_name=$request->input('medicine_name');
        $medicinelist->strength=$request->input('strength');
        $medicinelist->generic_name=$request->input('generic_name');
        $medicinelist->box_size=$request->input('box_size');
        $medicinelist->unit=$request->input('unit');
        $medicinelist->shelf=$request->input('shelf');
        $medicinelist->medicine_details=$request->input('med_details');
        $medicinelist->category=$request->input('category');
        $medicinelist->price=$request->input('price');
        $medicinelist->medicine_type=$request->input('medicine_type');
        $medicinelist->manufacturer=$request->input('manufacturer');
        $medicinelist->manufacturer_price=$request->input('manufacturer_price');
        $medicinelist->vat=$request->input('vat');
        $medicinelist->igta=$request->input('igta');
        $medicinelist->status=$request->input('status');
        $medicinelist->save();
        return response()->json([
           'status'=>200,
           'message'=>'Medicine Added Successfully.'
       ]);
    }
    }
       } // end method

        // method for editing medicine list data
            public function MedicineListEdit($id){
            $medicinelist = MedicineList::find($id);
            return response()->json([
                'status' =>200,
                'medicinelist' => $medicinelist,
            ]);
        }


    // method for updating data
    public function MedicineListUpdate(Request $request){
      $validator = Validator::make($request->all(), [
        'name' => 'required|max:100',
         

    ]);
    if($validator->fails())
    {
        return response()->json([
            'status'=>400,
            'errors'=>$validator->messages()
        ]);
    }
    else
    {
        if(Auth::guard('admin')->check()){
           
             $auth_id = Auth::guard('admin')->user()->outlet_id;
        }
        elseif(Auth::guard('doctor')->check()){
            $auth_id = Auth::guard('doctor')->user()->outlet_id;
        }
        if ($request->file('image')) {
            $old_img  = $request->old_image;
            unlink($old_img);
            $file = $request->file('image');
            $extension = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(300,300)->save('uploads/medicine/'.$extension);
            $save_url = 'uploads/medicine/'.$extension;

            $medicinelist_id=$request->input('medicinelist_id');
            $medicinelist = MedicineList::find($medicinelist_id);
            $medicinelist->outlet_id=$auth_id ;
            $medicinelist->medicine_name=$request->input('name');
            $medicinelist->strength=$request->input('strength');
            $medicinelist->generic_name=$request->input('gen_name');
            $medicinelist->shelf=$request->input('shelf');
            $medicinelist->medicine_details=$request->input('med_details');
            $medicinelist->category=$request->input('category_id');
            $medicinelist->price=$request->input('price');
            $medicinelist->manufacturer=$request->input('manufacture_id');
            $medicinelist->manufacturer_price=$request->input('menu_price');
            $medicinelist->image=$save_url;
            $medicinelist->update();
            return response()->json([
                'status'=>200,
                'message'=>'Medicine Updated Successfully.'
            ]);
      }  
        else{
            if(Auth::guard('admin')->check()){
           
             $auth_id = Auth::guard('admin')->user()->outlet_id;
            }
            elseif(Auth::guard('doctor')->check()){
                $auth_id = Auth::guard('doctor')->user()->outlet_id;
            }
            $medicinelist_id=$request->input('medicinelist_id');
            $medicinelist = MedicineList::find($medicinelist_id);
            $medicinelist->outlet_id=$auth_id ;
            $medicinelist->medicine_name=$request->input('name');
            $medicinelist->generic_name=$request->input('gen_name');
            $medicinelist->shelf=$request->input('shelf');
            $medicinelist->medicine_details=$request->input('med_details');
            $medicinelist->category=$request->input('category_id');
            $medicinelist->price=$request->input('price');
            $medicinelist->manufacturer=$request->input('manufacture_id');
            $medicinelist->manufacturer_price=$request->input('menu_price');
            $medicinelist->update();
            
            return response()->json([
                'status'=>200,
                'message'=>'Medicine Updated Successfully.'
            ]);
        }
  } 
}

    // delete Medicine List
    public function MedicineListDelete($id){
    $medicinelist = MedicineList::findOrFail($id);
        if($medicinelist->image){
            $img = $medicinelist->image;
            unlink($img);
        }
        MedicineList::findOrFail($id)->delete();
        $notification = array(
            'message' =>  'Medicine Deleted Sucessfully',
            'alert-type' => 'info'
        ); 
        return redirect()->back()->with($notification); 
    }
}
