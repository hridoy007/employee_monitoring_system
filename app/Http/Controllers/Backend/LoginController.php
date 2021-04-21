<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        $admin=Admin::all();
        return view('backend.layouts.admin.admin',compact('admin'));
    }
    public function loginCreate(Request $request)

    {

                 Admin::create([
                     'name'=>$request->name,
                     'email'=>$request->email,
                     'id'=>$request->id,
                     'password'=>$request->password,

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
