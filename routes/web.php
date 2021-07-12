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
    return view('companyProfile');
});

Route::get('/layouts', function () {
    return view('admin.Tadmin.master');
});

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth:admin', 'ceklevel:admin,petugas']
], function(){
    Route::get('/' , 'DashboardController@index')->name('dashboard.index');
    Route::get('/logout' , 'DashboardController@logout')->name('dashboard.logout');
});


Route::group([
    'prefix' => 'trash',
    'middleware' => ['auth:admin', 'ceklevel:admin,petugas']
], function(){
    Route::get('/pdfForm' , 'TrashController@pdfForm')->name('trash.pdfForm'); 
    Route::get('/cetakPertanggal/{tglawal}/{tglakhir}' , 'TrashController@cetakPertanggal'); 

    Route::get('/create' , 'TrashController@create')->name('trash.create'); 
    Route::post('/' , 'TrashController@store')->name('trash.store'); 
    Route::get('/' , 'TrashController@index')->name('trash.index'); 
    Route::get('/{id}/edit' , 'TrashController@edit')->name('trash.edit'); 
    Route::put('/{id}' , 'TrashController@update')->name('trash.update'); 
    Route::get('/{id}' , 'TrashController@destroy')->name('trash.destroy'); 
});

Route::group([
    'prefix' => 'collector',
    'middleware' => ['auth:admin', 'ceklevel:admin,petugas']
], function(){
    Route::get('/pdfForm' , 'CollectorController@pdfForm')->name('collector.pdfForm'); 
    Route::get('/cetakPertanggal/{tglawal}/{tglakhir}' , 'CollectorController@cetakPertanggal'); 

    Route::get('/create' , 'CollectorController@create')->name('collector.create'); 
    Route::post('/' , 'CollectorController@store')->name('collector.store'); 
    Route::get('/' , 'CollectorController@index')->name('collector.index'); 
    Route::get('/{id}/edit' , 'CollectorController@edit')->name('collector.edit'); 
    Route::put('/{id}' , 'CollectorController@update')->name('collector.update'); 
    Route::get('/{id}' , 'CollectorController@destroy')->name('collector.destroy'); 
});

Route::group([
    'prefix' => 'sell',
    'middleware' => ['auth:admin', 'ceklevel:admin,petugas']
], function(){
    Route::get('/pdfForm' , 'SellController@pdfForm')->name('sell.pdfForm'); 
    Route::get('/cetakPertanggal/{tglawal}/{tglakhir}' , 'SellController@cetakPertanggal'); 

    Route::get('/inputnorek' , 'SellController@inputnorek')->name('sell.inputnorek'); 
    Route::get('/ceknorek' , 'SellController@ceknorek')->name('sell.ceknorek'); 
    Route::post('/{id}' , 'SellController@store')->name('sell.store'); 
    Route::get('/' , 'SellController@index')->name('sell.index');

    Route::get('/{id}' , 'SellController@destroy')->name('sell.destroy'); 
});

Route::group([
    'prefix' => 'user',
    'middleware' => ['auth:admin', 'ceklevel:admin,petugas']
], function(){
    Route::get('/' , 'UserController@index')->name('user.index');
    Route::get('/{id}/show' , 'UserController@show')->name('user.show');
    Route::get('/{id}' , 'UserController@delete')->name('user.delete');
    Route::get('/noactive/{id}' , 'UserController@noactive')->name('user.noactive');
    Route::get('/active/{id}' , 'UserController@active')->name('user.active');
});

Route::group([
    'prefix' => 'transaction',
    'middleware' => ['auth:admin', 'ceklevel:admin,petugas']
    
], function(){
    Route::get('/pdfForm' , 'TransactionController@pdfForm')->name('transaction.pdfForm'); 
    Route::get('/cetakPertanggal/{tglawal}/{tglakhir}' , 'TransactionController@cetakPertanggal'); 

    Route::get('/inputnorek' , 'TransactionController@inputnorek')->name('transaction.inputnorek');
    Route::get('/ceknorek' , 'TransactionController@ceknorek')->name('transaction.ceknorek');
    Route::post('/{id}' , 'TransactionController@store')->name('transaction.store');
    Route::get('/' , 'TransactionController@index')->name('transaction.index');

    Route::get('/{id}/edit' , 'TransactionController@edit')->name('transaction.edit'); 
    Route::put('/{id}' , 'TransactionController@update')->name('transaction.update'); 
    Route::get('/{id}' , 'TransactionController@destroy')->name('transaction.destroy'); 
});

Route::group([
    'prefix' => 'pull',
    'middleware' => ['auth:admin', 'ceklevel:admin,petugas']
], function(){
    Route::get('/pdfForm' , 'PullController@pdfForm')->name('pull.pdfForm'); 
    Route::get('/cetakPertanggal/{tglawal}/{tglakhir}' , 'PullController@cetakPertanggal'); 

    Route::get('/inputnorek' , 'PullController@inputnorek')->name('pull.inputnorek');
    Route::get('/ceknorek' , 'PullController@ceknorek')->name('pull.ceknorek');
    Route::post('/{id}' , 'PullController@store')->name('pull.store');
    Route::get('/' , 'PullController@index')->name('pull.index');

    Route::get('/active/{id}' , 'PullController@active')->name('pull.active');
});

Auth::routes();
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth:admin', 'ceklevel:admin']
], function(){
    Route::get('/index' , 'AdminController@index')->name('admin.index');
    Route::get('/create' , 'AdminController@create')->name('admin.create');
    Route::post('/register' , 'AdminController@register')->name('admin.register');
    Route::get('/{id}/edit' , 'AdminController@edit')->name('admin.edit');
    Route::put('/{id}' , 'AdminController@update')->name('admin.update');
});


/**
 * this is the code for the users
 */
Route::group(['middleware' => ['auth:web', 'isUser']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/inputnorek', 'HomeController@inputnorek')->name('user.inputnorek');
    Route::get('/ceknorek', 'HomeController@ceknorek')->name('user.ceknorek');
    Route::post('/user/{id}', 'HomeController@store')->name('user.store');

    Route::get('/infortarik', 'HomeController@infortarik')->name('user.infortarik');
    Route::get('/riwayatTransaction', 'HomeController@riwayatTransaction')->name('user.riwayatTransaction');

    Route::get('/pdfFormPenarikan' , 'HomeController@pdfFormPenarikan')->name('user.pdfFormPenarikan'); 
    Route::get('/cetakPertanggalPenarikan/{tglawal}/{tglakhir}' , 'HomeController@cetakPertanggalPenarikan');
     
    Route::get('/pdfForm' , 'HomeController@pdfForm')->name('user.pdfForm'); 
    Route::get('/cetakPertanggal/{tglawal}/{tglakhir}' , 'HomeController@cetakPertanggal'); 
});
