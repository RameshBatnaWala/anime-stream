<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangeStatus extends Controller
{


    public function show(Request $RE){
        
        $statusList = array(
            0 => "Watching",
            1 => "Completed",
            2 => "On-hold",
            3 => "Dropped",
            4 => "Plan-to-watch",
            5 => "None",
        );


        if(\Auth::check())
        {
            $stat = $RE->input('status');
            
            $status = \App\Status::where('SeriesID',$RE->input('SeriesID'))->where('UserID',\Auth::id())->first();
            if($status != null && $stat == "None")
            {
                $status->delete();
            }
            else if($status == null)
            {
                $status = new \App\Status();
                $status->UserID = \Auth::id();
                $status->SeriesID = $RE->input('SeriesID');
                $status->Status = array_search($stat, $statusList);
                $status->save();
            }
            else
            {
              $status->Status = array_search($stat, $statusList);
              $status->save();  
            }
            
        }
        return url('Test');
    }
}
