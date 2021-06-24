<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    use HasFactory;
    protected $guarded=[];

    public function projectTeam()
    {
        return $this->belongsTo(Projectteam::class,'team_id','id');
    }

}
