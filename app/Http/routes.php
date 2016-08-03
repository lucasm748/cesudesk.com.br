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
Route::get('logout', 'Auth\AuthController@getLogout');

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/', 'HomeController@index');
});

Route::post('login', 'Auth\AuthController@postLogin');


// \Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
//     echo "\n Query \n";
//     print_r($query->sql);
//     echo "\n";
//     echo "Parâmetros \n";
//     print_r($query->bindings);
//     echo "\n \n ";
//     // var_dump($query->time);
// });
