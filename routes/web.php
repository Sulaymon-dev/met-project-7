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
    Route::resource('sinfs', 'Admin\SinfsController');
    Route::get('books/list', 'Admin\BooksController@list');
    Route::resource('books', 'Admin\BooksController');
    Route::resource('plans', 'Admin\PlansController');
    Route::resource('users', 'Admin\UsersController')->only(['index', 'update', 'destroy']);
});

Route::get('/logout', function () {
    Auth::logout();
    return view('login');
});

Route::get('/', 'IndexController@index')->name('index');
Route::get('/subjects', 'SubjectsController@index')->name('subjects');
Route::get('/subject/{slug}', 'SubjectsController@show')->name('subject');

Route::get('/class', 'SubjectsController@sinf')->name('class');

Route::get('/theme/{id}', 'SubjectsController@theme')->name('theme');

Route::get('/olympics', 'OlympicsController@index')->name('olympics');
Route::get('/olympic/{id}', 'OlympicsController@show')->name('olympic');

Route::get('/mmt', 'MmtsController@index')->name('mmt');
//Route::get('/mmt/{cluster}', 'MmtsController@cluster')->name('mmt');
Route::get('/mmt/{id}', 'MmtsController@show')->name('mmt-info');

Route::get('/for-pupil', function () {
    return view('front.pages.info');
})->name('info');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

