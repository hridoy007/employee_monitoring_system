<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('backend.layouts.login.login');
    }
    public function loginCreate(Request $request)

    {

                 Admin::create([
                     'name'=>$request->name,
                     'email'=>$request->email,
                     'password'=>$request->password

    ]);

                 return redirect()->route('login.view');
    }
}
