<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class Homepage extends Controller
{
    public function show(){
        $planToWatch = null;
        $shows = null;
        $RandomShow = \App\AllSeries::inRandomOrder()->take(6)->get();
        $airing = \App\AllSeries::where('seriesStatus', "Currently Airing")->inRandomOrder()->take(6)->get();
        if(\Auth::check())
        {
            $planToWatch = \App\Status::where('UserID',\Auth::id())->where('Status',0)->inRandomOrder()->take(6)->get();
            

            $array = array();
            foreach($planToWatch as $show)
            {
                $array[] = $show->SeriesID;
            }

            $shows = \App\AllSeries::inRandomOrder()->find($array)->take(6);
        }
        return view('Home',compact('shows','RandomShow','airing'));
    }
}
