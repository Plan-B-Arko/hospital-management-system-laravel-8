<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
     // admin profile
     public function AdminProfile(){

        $adminProfile = Admin::find(1);

        return view('admin.admin_profile_view', compact('adminProfile'));
    } // end method
}
