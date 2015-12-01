<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'IndexController@index');
Route::get('/post/{name}','IndexController@show');
Route::post('/post/{name}','IndexController@show');
Route::get('/tag/{name}','IndexController@showTag');

Route::get('auth/login','Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@postLogin');

Route::group(['middleware'=>'auth','prefix'=>'goenitz','namespace'=>'Goenitz'],function(){
    Route::get('/','DashboardController@index');

    //articles
    Route::resource('articles','ArticleController',[
        'except'=>['destroy','show']
    ]);
    Route::get('articles/{id}/destroy','ArticleController@destroy');

    //tags
    Route::resource('tags','TagController',[
        'except'=>['destroy','show']
    ]);
    Route::get('tags/{id}/destroy','TagController@destroy');
});
