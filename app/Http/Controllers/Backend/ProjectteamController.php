<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Employee;
use App\Models\Backend\Project;
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


        return redirect()->route('projectteam')->with('success','Project team Added Successfully');
    }

    public function projectteamDelete ($id)
    {
        $projectteam=Projectteam::find($id);
        $projectteam->delete();
        return redirect()->route('projectteam')->with('success','Project team Removed Successfully');
    }

    public function projectteamEdit($id)
    {
        $projectteam = Projectteam::find($id);
        return view('backend.layouts.projectteam.projectteamUpdate', compact('projectteam'));
    }

    public function projectteamUpdate(Request$request,$id)
    {

        Projectteam::find($id)->update([

            'name' => $request->teamName,
            'project_code' => $request->projectCode

        ]);
        return redirect()->route('projectteam')->with('success','Project Team Updated Successfully');
    }


}
