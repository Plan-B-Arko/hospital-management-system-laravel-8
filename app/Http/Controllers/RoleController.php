<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function AddRole()
    {
        $roles = Role::all();
        return view('super_admin.roles_permissioon.add_role', compact('roles'));
    }

    public function StoreRole(Request $request)
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
            $role = new Role;
            $role->name = ucwords($request->input('name'));
            $role->save();
            return response()->json([
                'status' => 200,
                'message' => 'New Role Added Successfully.'
            ]);
        }
    }
}
