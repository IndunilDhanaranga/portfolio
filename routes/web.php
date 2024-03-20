<?php

use Illuminate\Support\Facades\Route;

/*
----------------------------------------------------------------------------------------------------------
                                                FRONT END ROUTES
----------------------------------------------------------------------------------------------------------
*/

Route::group([
    'namespace'=>'App\Http\Controllers',
],function ($router) {

    /*
    ----------------------------------------------------------------------------------------------------------
    VIEW CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */
    Route::get('/'                              , 'ViewController@frontend')->name('home');
});

/*
----------------------------------------------------------------------------------------------------------
                                            BACK END ROUTES
----------------------------------------------------------------------------------------------------------
*/

/*
----------------------------------------------------------------------------------------------------------
BACK END ROUTES WITHOUT LOGIN VALIDATE
----------------------------------------------------------------------------------------------------------
*/

Route::group([
    'namespace'=>'App\Http\Controllers',

],function ($router) {

    /*
    ----------------------------------------------------------------------------------------------------------
    VIEW CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/login'                              , 'ViewController@login')->name('login');
    Route::post('/signin'                              , 'AuthController@dologin')->name('signin');
});

/*
----------------------------------------------------------------------------------------------------------
BACK END ROUTES WITH LOGIN VALIDATE
----------------------------------------------------------------------------------------------------------
*/

Route::group([
    'middleware'=>['App\Http\Middleware\Login'],
    'namespace'=>'App\Http\Controllers',
],function ($router) {

    /*
    ----------------------------------------------------------------------------------------------------------
    AUTH CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/logout'                              , 'AuthController@dologout')->name('logout');



    /*
    ----------------------------------------------------------------------------------------------------------
    VIEW CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/dashboard'                              , 'ViewController@dashboard')->name('dashboard');
    Route::get('/basic-details'                          , 'ViewController@basicDetails')->name('basic-details');

    Route::post('/basic-details-create'                          , 'ActionController@createBasicDetails')->name('basic-details-create');
    Route::post('/create-school'                          , 'ActionController@createSchool')->name('create-school');
    Route::post('/create-education-level'                          , 'ActionController@createEducationLevel')->name('create-education-level');
    Route::post('/create-education-qualification'                          , 'ActionController@createEducationQualification')->name('create-education-qualification');


    Route::get('/schools-collages'                          , 'ViewController@schoolCollages')->name('schools-collages');
    Route::get('/education-levels'                          , 'ViewController@educationLevels')->name('education-levels');
    Route::get('/education-qualification'                , 'ViewController@educationQualification')->name('education-qualification');
});
