<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class addViewed extends Controller
{
    public function show($id){
        
        if(\Auth::check())
        {
       
            $getViewed = \App\viewedEpisode::where('UserID',\Auth::id())->where('EpisodeID',$id)->first();
            if($getViewed != null)
            {
                $getViewed->delete();
            }
            else
            {
                $Episode = \App\Episodes::where('id',$id)->first();
                $newView = new \App\viewedEpisode();
                $newView->UserID = \Auth::id();
                $newView->EpisodeID = $id;
                $newView->SeriesID = $Episode->SeriesID;
                $newView->save();
            }
        }
        return url('episode/'.$id);
    }
}
