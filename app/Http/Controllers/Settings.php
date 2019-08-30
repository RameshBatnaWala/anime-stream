<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Storage;
class Settings extends Controller
{
    public function show(){


        $user = \Auth::user();
        return view("User/Settings", compact('user'));
    }

    public function store(Request $request)
    {
        error_log($request->WatchList);
        $user = \Auth::user();
        if($request->WatchList == "on")
        {
            $user->AutoWatch = 1;
            $user->save();
        }
        else
        {
            $user->AutoWatch = 0;
            $user->save();
        }
        if($request->myfile != null)
        {
            $path = Storage::disk('public')->put('backImage', $request->myfile);
            
            $user->Banner = $path;
            $user->save();
            error_log($path);
        }
        return redirect('User');
    }
}
