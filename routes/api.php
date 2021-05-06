<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/v1/classes','API\V1\AppController@getClasses');
Route::get('/v1/subjects','API\V1\AppController@getSubjects');
Route::get('/v1/classesBySubject','API\V1\AppController@getClassesBySubject');
Route::get('/v1/subjectsByClass','API\V1\AppController@getSubjectsByClasses');
Route::get('/v1/themes','API\V1\AppController@getThemes');
Route::get('/v1/theme/','API\V1\AppController@getThemeById');
Route::get('/v1/olympics/','API\V1\AppController@getOlympics');
Route::get('/v1/olympic/','API\V1\AppController@getOlympicById');
Route::get('/v1/news/','API\V1\AppController@getNews');
Route::get('/v1/new/','API\V1\AppController@getNewById');
Route::get('/v1/main_slider/','API\V1\AppController@getMainSlider');
Route::get('/v1/second_slider/','API\V1\AppController@getSecondSlider');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
