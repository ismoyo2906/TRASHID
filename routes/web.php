<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::group([
    'prefix' => 'user'
], function(){
    Route::get('/' , 'UserController@index')->name('user.index');
    Route::get('/{id}/show' , 'UserController@show')->name('user.show');
    Route::get('/{id}' , 'UserController@delete')->name('user.delete');
    Route::get('/noactive/{id}' , 'UserController@noactive')->name('user.noactive');
    Route::get('/active/{id}' , 'UserController@active')->name('user.active');
});

Route::group([
    'prefix' => 'transaction'
], function(){
    Route::get('/inputnorek' , 'TransactionController@inputnorek')->name('transaction.inputnorek');
    Route::get('/ceknorek' , 'TransactionController@ceknorek')->name('transaction.ceknorek');
    Route::post('/{id}' , 'TransactionController@store')->name('transaction.store');
    Route::get('/' , 'TransactionController@index')->name('transaction.index');

    Route::get('/{id}/edit' , 'TransactionController@edit')->name('transaction.edit'); 
    Route::put('/{id}' , 'TransactionController@update')->name('transaction.update'); 
    Route::get('/{id}' , 'TransactionController@destroy')->name('transaction.destroy'); 
});

Route::group([
    'prefix' => 'pull'
], function(){
    Route::get('/inputnorek' , 'PullController@inputnorek')->name('pull.inputnorek');
    Route::get('/ceknorek' , 'PullController@ceknorek')->name('pull.ceknorek');
    Route::post('/{id}' , 'PullController@store')->name('pull.store');
    Route::get('/' , 'PullController@index')->name('pull.index');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'isUser']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
});
