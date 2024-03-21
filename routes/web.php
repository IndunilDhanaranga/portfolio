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

    Route::get('/login'                             , 'ViewController@login')->name('login');
    Route::post('/signin'                           , 'AuthController@dologin')->name('signin');
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

    Route::get('/logout'                            , 'AuthController@dologout')->name('logout');



    /*
    ----------------------------------------------------------------------------------------------------------
    VIEW CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */

    /*
    ----------------------------------------------------------------------------------------------------------
                                                PORTFOLIO DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/dashboard'                         , 'ViewController@dashboard')->name('dashboard');

    Route::get('/basic-details'                     , 'ViewController@basicDetails')->name('basic-details');

    Route::get('/education-qualification'           , 'ViewController@educationQualification')->name('education-qualification');

    Route::get('/expertise'                         , 'ViewController@expertiseView')->name('expertise');

    Route::get('/additional-details'                , 'ViewController@additionalDetails')->name('additional-details');

    Route::get('/schools-collages'                  , 'ViewController@schoolCollages')->name('schools-collages');

    Route::get('/education-levels'                  , 'ViewController@educationLevels')->name('education-levels');

    Route::get('/project-type'                      , 'ViewController@projectTypes')->name('project-type');



    /*
    ----------------------------------------------------------------------------------------------------------
    ACTION CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */

    /*
    ----------------------------------------------------------------------------------------------------------
                                                PORTFOLIO DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/basic-details-create'             , 'ActionController@createBasicDetails')->name('basic-details-create');

    Route::post('/create-education-qualification'   , 'ActionController@createEducationQualification')->name('create-education-qualification');

    Route::post('/create-expertise'                 , 'ActionController@createExpertise')->name('create-expertise');

    Route::post('/create-additional-details'        , 'ActionController@createAdditionalDetails')->name('create-additional-details');

    Route::post('/create-school'                    , 'ActionController@createSchool')->name('create-school');

    Route::post('/create-education-level'           , 'ActionController@createEducationLevel')->name('create-education-level');


});
