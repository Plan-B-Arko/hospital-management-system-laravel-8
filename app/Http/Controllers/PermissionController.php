<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function AddPermission()
    {
        $permissions = Permission::all();
        return view('super_admin.roles_permissioon.add_permission', compact('permissions'));
    }

    public function StorePermission(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $permission = new Permission;
            $permission->name = ucwords($request->input('name'));
            $permission->save();
            return response()->json([
                'status' => 200,
                'message' => 'New Permission Added Successfully.'
            ]);
        }
    }
}
