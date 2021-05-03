<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin()
    {

        return view('backend.layouts.login page.login');
    }

    public function adminValidate(Request $request)
    {

        $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:6'

        ]);

        $credentials = $request->only('email', 'password');
//        dd($credentials);
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.view');
        }
        return back()->withErrors([
            'email' => 'Invalid Credentials.',
        ]);


    }

    public function adminLogout()
    {

        Auth::guard('web')->logout();

        return redirect()->route('admin.page')->with('success', 'Logout Successfully');
    }
}


