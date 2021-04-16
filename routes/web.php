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
    Route::get('plans/list', 'Admin\PlansController@list');
    Route::resource('plans', 'Admin\PlansController');
    Route::resource('clusters', 'Admin\ClustersController');
    Route::resource('mmts', 'Admin\MmtsController',['parameters' => 'mmt']);
    Route::get('themes/quiz4x1','Admin\ThemesController@showQuiz4in1' )->name('themes.quiz4in1');
    Route::get('themes/matching', 'Admin\ThemesController@showMatching')->name('themes.matching');
    Route::get('themes/json', 'Admin\ThemesController@showJson')->name('themes.test_json');
    Route::get('mmt_fans/quiz4x1', 'Admin\MMTFansController@showQuiz4in1')->name('mmt_fans.quiz4in1');
    Route::get('mmt_fans/matching', 'Admin\MMTFansController@showMatching')->name('mmt_fans.matching');
    Route::get('mmt_fans/json', 'Admin\MMTFansController@showJson')->name('mmt_fans.test_json');
    Route::get('olympics/quiz4x1','Admin\OlympicsController@showQuiz4in1' )->name('olympics.quiz4in1');
    Route::get('olympics/matching', 'Admin\OlympicsController@showMatching')->name('olympics.matching');
    Route::get('olympics/json', 'Admin\OlympicsController@showJson')->name('olympics.test_json');
    Route::resource('themes', 'Admin\ThemesController');
    Route::resource('olympics', 'Admin\OlympicsController');
    Route::resource('mmt_fans', 'Admin\MMTFansController');
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


Route::get('/for-pupil', function () {
    return view('front.pages.info');
})->name('info');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

