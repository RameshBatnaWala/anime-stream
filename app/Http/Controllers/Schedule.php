<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class Schedule extends Controller
{
    public function show(){

        $schedule = \App\Schedule::get();
        error_log($schedule);
        return view("Schedule", compact('schedule'));
    }
}
