<?php

use Illuminate\Support\Facades\Route;
use App\Mail\RequestResponse;

use App\Mail\AcceptedRequest;
use App\Mail\DenyRequest;


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


Route::get('/add', 'AddController@index')->name('add');
Route::post('/add', 'AddController@upload')->name('add');

Route::get('/view', 'ViewController@index')->name('view');

Route::get('/requesttable', 'RequestTableController@index')->name('requesttable');
Route::post('/requesttable', 'RequestTableController@update')->name('requesttable');

Route::get('edit/{id}', 'EditController@index')->name('edit');
Route::post('edit/{id}', 'EditController@update')->name('edit');



Route::get('/request/{id}', 'RequestController@show')->name('request');
Route::post('/request/{id}', 'RequestController@create')->name('request');


Route::get('viewmore/{id}', 'ViewMoreController@show')->name('viewmore');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
