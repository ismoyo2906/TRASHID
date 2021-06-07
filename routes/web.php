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