<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class SingleShow extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statusList = array(
            0 => "Watching",
            1 => "Completed",
            2 => "On-hold",
            3 => "Dropped",
            4 => "Plan-to-watch",
            5 => "None",
        );

        
        error_log($id);
        $show = \App\AllSeries::where('id',$id)->first();
        $episodes = \App\Episodes::where('SeriesID',$id)->get();
        $watched = \App\viewedEpisode::where('SeriesID',$id)->get();

        $Favourite = null;
        $status = null;
        $statName = "None";
        if(\Auth::check())
        {
            $status = \App\Status::where('SeriesID',$id)->where('UserID',\Auth::id())->first();
            if($status != null)
            {
                $statName = $statusList[$status->Status];
            }
            $Favourite = \App\Favourite::where('SeriesID',$id)->where('userID',\Auth::id())->first();
        }
        $genres = explode(";",$show->genres);

        

        return view('SeriesPage',compact('show','episodes','genres','watched','Favourite','status','statName'));
    }
}