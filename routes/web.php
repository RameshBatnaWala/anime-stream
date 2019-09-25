<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('Schedule','Schedule@show');
Route::get('Show/{id}','SingleShow@show');
Route::get('addVideo/{id}','addDownload@show');
Route::get('episode/{id}','episode@show');
Route::get('views/{id}','addViewed@show');
Route::get('Favourite/{id}','FavouriteShow@show');
Route::get('ChangeStatus','ChangeStatus@show');
Route::get('All','AllShows@show');
Route::get('User/','User@show');
Route::get('User/{type}','User@WithSet');
Route::get('/','Homepage@show');
Route::get('RemoveVideo/{id}','delete@show');
Route::get('Settings', 'Settings@show');
Route::post('Settings','Settings@store');
Route::get('H',function(){
    
    return view('Home');
});



Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

