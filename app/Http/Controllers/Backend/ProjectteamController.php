<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Projectteam;
use Illuminate\Http\Request;

class ProjectteamController extends Controller

{
    public function projectteam()
    {
        $projectteam=Projectteam::paginate('2');
        return view('backend.layouts.projectteam.projectteam',compact('projectteam'));
    }

    public function projectteamInfo(Request $request)
    {

        Projectteam::create([

            'name' => $request->teamName,
            'project_code' => $request->projectCode

        ]);


        return redirect()->route('projectteam');
    }

}
