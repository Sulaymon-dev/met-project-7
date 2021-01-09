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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::prefix('/admin/')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('subjects/pdf', 'Admin\SubjectsController@makePdf')->name('subjects.pdf');
    Route::resource('subjects', 'Admin\SubjectsController');
});

Route::get('/', 'IndexController@index')->name('index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

