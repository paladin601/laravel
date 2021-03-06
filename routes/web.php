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

use Illuminate\Http\Request;

Route::group(['middleware' => ['language']], function () {
    
    Auth::routes();
    Route::get('/', 'PagesController@index')->name('home');
    Route::get('/detail', 'PagesController@detail')->name('detail');
    Route::post('/store', 'PagesController@store')->name('store');
    Route::get('/update/{Cedula}', 'PagesController@update')->name('update');
    Route::post('/update', 'PagesController@updateStore')->name('update.store');
    Route::post('/remove', 'PagesController@remove')->name('remove');
    Route::get('/index', 'PagesController@indexClean')->name('indexClean');

 
    Route::get('lang/{lang}', function (Request $request,$lang) {
        $request->session()->forget('error');
        $request->session()->forget('success');
        session(['lang' => $lang]);
        return \Redirect::back();
    })->where([
        'lang' => 'en|es|fr'
    ]);
 
});