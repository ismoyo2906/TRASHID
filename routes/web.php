<?php
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/layouts', function () {
    return view('admin.Tadmin.master');
});

Route::group([
    'prefix' => 'trash'
], function(){
    Route::get('/create' , 'TrashController@create')->name('trash.create'); 
    Route::post('/' , 'TrashController@store')->name('trash.store'); 
    Route::get('/' , 'TrashController@index')->name('trash.index'); 
    Route::get('/{id}/edit' , 'TrashController@edit')->name('trash.edit'); 
    Route::put('/{id}' , 'TrashController@update')->name('trash.update'); 
    Route::get('/{id}' , 'TrashController@destroy')->name('trash.destroy'); 
});

Route::group([
    'prefix' => 'collector'
], function(){
    Route::get('/create' , 'CollectorController@create')->name('collector.create'); 
    Route::post('/' , 'CollectorController@store')->name('collector.store'); 
    Route::get('/' , 'CollectorController@index')->name('collector.index'); 
    Route::get('/{id}/edit' , 'CollectorController@edit')->name('collector.edit'); 
    Route::put('/{id}' , 'CollectorController@update')->name('collector.update'); 
    Route::get('/{id}' , 'CollectorController@destroy')->name('collector.destroy'); 
});

Route::group([
    'prefix' => 'sell'
], function(){
    Route::get('/inputnorek' , 'SellController@inputnorek')->name('sell.inputnorek'); 
    Route::get('/ceknorek' , 'SellController@ceknorek')->name('sell.ceknorek'); 
    Route::post('/{id}' , 'SellController@store')->name('sell.store'); 
    Route::get('/' , 'SellController@index')->name('sell.index');
});