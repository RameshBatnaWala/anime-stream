<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllShows extends Controller
{
    public function show(){
        $shows = \App\AllSeries::get();
        $genres = \App\genres::get();
        return view('AllShows',compact('shows','genres'));
    }
}
