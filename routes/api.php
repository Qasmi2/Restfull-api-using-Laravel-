<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/','registerController@index');
Route::get('articles','ArticleController@index');

//single Article
Route::get('article/{id}','ArticleController@show');
//new article
Route::post('article','ArticleController@store');

// update article
Route::put('article','ArticleController@store');

//delete article
Route::delete('article/{id}','ArticleController@destroy');


// 2nd controller 


Route::get('lasts','lastController@index');
Route::get('last/{id}','lastController@show');
//new article
Route::post('last','lastController@store');

// update article
Route::put('last','lastController@store');

//delete article
Route::delete('last/{id}','lastController@destroy');
