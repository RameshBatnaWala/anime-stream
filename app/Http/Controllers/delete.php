<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use File;


class delete extends Controller
{
    public function show($id){

        $episodes = \App\Episodes::where('SeriesID', $id)->get();
        foreach($episodes as $epi)
        {
            File::deleteDirectory(public_path('storage/'.$epi->reference));
        }
        \App\Episodes::where('SeriesID', $id)->delete();
        $series = \App\AllSeries::where('id',$id)->first();
        $series->InDownloadList = 0;
        $series->save();
        return redirect('Show/'.$id);
    } 
}
