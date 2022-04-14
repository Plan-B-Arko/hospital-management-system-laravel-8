<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Outlet;
use App\Models\Admin;
use Intervention\Image\Facades\Image;

class OutletController extends Controller
{

    public function ViewOutlet()
    {
        $outlet = Outlet::all();
        return view('super_admin.outlets.index', compact('outlet'));
    }

    public function AddOutlet()
    {
        return view('super_admin.outlets.add_outlet');
    }
    public function outletStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'password' => 'required| min:6| max:12 |confirmed',
            'password_confirmation' => 'required| min:6'
        ]);

        // image upload
        $image = $request->file('icon');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/outlet/' . $name_gen);
        $save_url = 'upload/outlet/' . $name_gen;

        // for generate random ashim number
        function generateRandomString($length = 6)
        {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        $grn = generateRandomString();
        // End generate random number
        // Return $grn;

        Outlet::create([
            'outlet_code' => '#' . $grn,
            'outlet_name' => $request->outlet_name,
            'email' => $request->outlet_email,
            'Phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'image' =>  $save_url,
            'password' => Hash::make($request->password),
        ]);

        $notification = array(
            'message' => 'project add sucessfully',
            'alert-type' => 'success'
        );
        return redirect()->route('view.outlet')->with($notification);
    }

    public function deleteOutlet($id)
    {
        $outlet = Outlet::findOrFail($id);
        $img = $outlet->image;
        unlink($img);
        Outlet::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Outlate deleted sucessfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function editOutlet($id)
    {
        $edit = Outlet::findorfail($id);
        //return $edit;
        return view('super_admin.outlets.edit_outlet', compact('edit'));
    }

    //outlet update
    public function outletUpdate(Request $request)
    {
        $old = $request->old_img;
        $id = $request->updateId;
        if ($request->icon) {
            unlink($old);
            $image = $request->file('icon');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('upload/outlet/' . $name_gen);
            $save_url = 'upload/outlet/' . $name_gen;
            // project Update
            Outlet::findOrFail($id)->update([
                'outlet_name' => $request->outlet_name,
                'email' => $request->email,
                'Phone' => $request->phone,
                'address' => $request->address,
                'status' => $request->status,
                'image' =>  $save_url,

            ]);
        } else {

            Outlet::findOrFail($id)->update([
                'outlet_name' => $request->outlet_name,
                'email' => $request->email,
                'Phone' => $request->phone,
                'address' => $request->address,
                'status' => $request->status,
            ]);
        }
        $notification = array(
            'message' => 'project add sucessfully',
            'alert-type' => 'success'
        );
        return redirect()->route('view.outlet')->with($notification);
    }

    // admins of different outlet
    public function AdminView()
    {
        $admins = Admin::with('outlet')->get();
        $outlets = Outlet::all();
        return view('super_admin.outlets.all_admin', compact('admins', 'outlets'));
    }

    // add admin of of different outlet
    public function AdminStore(Request $request)
    {
        $request->validate([
            'password' => 'required| min:6| max:12 |confirmed',
            'password_confirmation' => 'required| min:6'
        ]);

        $admin = new Admin();
        $admin->outlet_id = $request->outlet_id;
        $admin->name = $request->admin_name;
        $admin->email = $request->admin_email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return response()->json([
            'status' => 200,
            'message' => 'Admin Added Successfully.'
        ]);
    }
}
