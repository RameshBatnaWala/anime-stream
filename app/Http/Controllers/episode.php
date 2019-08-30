<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class episode extends Controller
{
    public function show($id){
        $currentEpisode = \App\Episodes::where('id',$id)->first();
        $show = \App\AllSeries::where('id',$currentEpisode->SeriesID)->first();
        $Watched = null;
        if(\Auth::check())
        {
            $Watched = \App\viewedEpisode::where('EpisodeID',$id)->where('UserID',\Auth::id())->first();
            
        }
        $episodes = \App\Episodes::where('SeriesID',$show->id)->get();
        return view('video',compact('currentEpisode','show','episodes','Watched'));
    }  
}
