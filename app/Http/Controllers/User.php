<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{

    function getIDS ($shows){
        $array = array();
        foreach($shows as $show)
        {
            $array[] = $show->SeriesID;
        }

        return $array;
    }

    public function show()
    {
        if(!\Auth::check())
        {
            return redirect('/');
        }
        $user = \Auth::user();
        $showStats = \App\Status::where('UserID',\Auth::id())->where('Status',0)->get();

        $array = array();
        foreach($showStats as $show)
        {
            $array[] = $show->SeriesID;
        }

        $shows = \App\AllSeries::find($array);
        $stat = 0;
        return view('User/User', compact('user', 'shows', 'stat'));
    }
    public function WithSet($type){

        if(!\Auth::check())
        {
            return redirect('/');
        }
        $user = \Auth::user();
        $showStats =  null;
        if($type == 5)
        {
            $showStats = \App\Status::where('UserID',\Auth::id())->get();
        }
        else
        {
            $showStats = \App\Status::where('UserID',\Auth::id())->where('Status',$type)->get();
        }
        $array = array();
        foreach($showStats as $show)
        {
            $array[] = $show->SeriesID;
        }

        $shows = \App\AllSeries::find($array);
        $stat = $type;
        return view('User/User', compact('user', 'shows', 'stat'));
    }
}
