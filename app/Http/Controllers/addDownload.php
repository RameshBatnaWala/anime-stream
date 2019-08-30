<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class addDownload extends Controller
{
    public function show($id)
    {
        error_log($id);
        $show = \App\AllSeries::where('id',$id)->first();
        $show->InDownloadList = 1;
        $show->save();
        $Donwload = new \App\DownloadList;
        $Donwload->SeriesID = $id;
        $Donwload->save();
        return redirect('Show/'.$id);
    }
}
