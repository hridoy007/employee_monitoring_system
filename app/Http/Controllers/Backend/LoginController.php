<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        $admin=Admin::where('role','admin')->get();
        return view('backend.layouts.admin.admin',compact('admin'));
    }
    public function loginCreate(Request $request)

    {

        $request->validate([

            'email'=>'required|email|unique:admins'

        ]);

        $user_file = "";

        if ($request->hasFile('admin_image')) {

            $file = $request->file('admin_image');
            if ($file->isValid()) {

                $user_file = date('Ymdhms') . "." . $file->getClientOriginalExtension();
                $file->storeAs('admins', $user_file);
            }
        }

                 Admin::create([
                     'name'=>$request->name,
                     'email'=>$request->email,
                     'image'=>$user_file,
                     'role'=>$request->role,

                     'password'=>bcrypt($request->password),

    ]);

                 return redirect()->route('admin.view')->with('success','Admin Added Successfully');
    }

    public function adminDelete ($id)
    {
        $admin=Admin::find($id);
        $admin->delete();
        return redirect()->route('admin.view')->with('success','Admin Removed Successfully');
    }

}
