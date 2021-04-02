<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectteamController extends Controller

{
    public function projectteam()
    {
        return view ('backend.layouts.projectteam');
    }
    //
}

