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
                                                    DEVELOPER TOOLS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/user'                              , 'ViewController@userDetails')->name('user');

    Route::get('/user-roll'                         , 'ViewController@userRoll')->name('user-roll');

    Route::get('/edit-user-roll/{id?}'              , 'ViewController@editUserRoll')->name('edit-user-roll');


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


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    PROJECT DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/create-project-type'               , 'ViewController@createProjectTypes')->name('create-project-type');



    /*
    ----------------------------------------------------------------------------------------------------------
                                                    CLIENT DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/create-client'                     , 'ViewController@createClient')->name('create-client');




    /*
    ----------------------------------------------------------------------------------------------------------
    ACTION CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */

    /*
    ----------------------------------------------------------------------------------------------------------
                                                    DEVELOPER TOOLS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/create-user-roll'                 , 'ActionController@createUserRoll')->name('create-user-roll');

    Route::post('/update-user-roll/{id?}'           , 'ActionController@updateUserRoll')->name('update-user-roll');

    Route::post('/create-user'                      , 'ActionController@createUser')->name('create-user');

    Route::post('/edit-user'                        , 'ActionController@editUser')->name('edit-user');

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


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    PROJECT DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/add-project-type'                 , 'ActionController@addProjectTypes')->name('add-project-type');

    Route::post('/update-project-type/{id?}'        , 'ActionController@updateProjectTypes')->name('update-project-type');



});
