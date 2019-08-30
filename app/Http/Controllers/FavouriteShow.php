<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavouriteShow extends Controller
{
    public function show($id){

       
        if(\Auth::check()){
            $exists = \App\Favourite::where('SeriesID',$id)->where('userID',\Auth::id())->first();
            if($exists == null)
            {
                $exists = new \App\Favourite();
                $exists->SeriesID = $id;
                $exists->userID = \Auth::id();
                $exists->save();
            }
            else
            {
                $exists->delete();
            }
        }

        return url('Show/'.$id);
    }
}
