<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {


    Route::group(['namespace' => 'Auth'], function(){

        Route::controllers([
            'admin'     =>  'AuthController',
            'password'  =>  'PasswordController'
        ]);

    });


    Route::group(['middleware' => 'auth'], function(){
        // middleware : auth

        Route::group(['prefix' => 'admin'], function(){
            // uri path localhost/admin/...

            Route::get('/', function(){
                return view('test');
            });

        });

    });


//    Route::get('admin', function(){
//       return view('test');
//    });

});
