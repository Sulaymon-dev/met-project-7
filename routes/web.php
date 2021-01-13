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
Route::get('/subjects', 'SubjectsController@index')->name('subjects');
Route::get('/subject/{slug}', 'SubjectsController@show')->name('subject');

Route::get('/class', 'SubjectsController@sinf')->name('class');

Route::get('/theme/{slug}', 'SubjectsController@theme')->name('theme');


Route::get('/for-pupil', function () {
    return view('front.pages.info');
})->name('info');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

