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

    Route::get('/project-details'                   , 'ViewController@projectDetails')->name('project-details');


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    PROJECT DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/project'                           , 'ViewController@viewProject')->name('project');

    Route::get('/create-project'                    , 'ViewController@createProject')->name('create-project');

    Route::get('/create-project-type'               , 'ViewController@createProjectTypes')->name('create-project-type');



    /*
    ----------------------------------------------------------------------------------------------------------
                                                    TASK DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/task-category'                     , 'ViewController@viewTaskCategory')->name('task-category');

    Route::get('/create-task'                       , 'ViewController@viewCreateTask')->name('create-task');

    Route::get('/view-task'                         , 'ViewController@viewTask')->name('view-task');

    Route::get('/edit-task/{id?}'                   , 'ViewController@editTask')->name('edit-task');

    Route::get('/todo'                              , 'ViewController@todoList')->name('todo');





    /*
    ----------------------------------------------------------------------------------------------------------
                                                    CLIENT DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/create-client'                     , 'ViewController@createClient')->name('create-client');

    Route::get('/view-client'                       , 'ViewController@viewClient')->name('view-client');




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

    Route::post('/portfolio-project-details'        , 'ActionController@projectDetails')->name('portfolio-project-details');


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    PROJECT DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/add-project-type'                 , 'ActionController@addProjectTypes')->name('add-project-type');

    Route::post('/update-project-type/{id?}'        , 'ActionController@updateProjectTypes')->name('update-project-type');

    Route::post('/add-project'                      , 'ActionController@addProject')->name('add-project');

    Route::post('/update-project'                   , 'ActionController@updateProject')->name('update-project');



    /*
    ----------------------------------------------------------------------------------------------------------
                                                    CLIENT DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/add-client'                       , 'ActionController@addClient')->name('add-client');

    Route::post('/update-client'                    , 'ActionController@updateClient')->name('update-client');


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    TASK DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/create-task-category'             , 'ActionController@createTaskCategory')->name('create-task-category');

    Route::post('/update-task-category'             , 'ActionController@updateTaskCategory')->name('update-task-category');

    Route::post('/add-task'                         , 'ActionController@addTask')->name('add-task');

    Route::post('/update-task/{id?}'                , 'ActionController@updateTask')->name('update-task');

    Route::get('/todo-status/{id?}/{status?}'       , 'ActionController@taskStatusChange')->name('todo-status');




    /*
    ----------------------------------------------------------------------------------------------------------
    AJAX CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    PROJECT DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/get-technology'                       , 'AjaxController@getTechnology')->name('get-technology');

    /*
    ----------------------------------------------------------------------------------------------------------
                                                    TASK DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/get-task'                             , 'AjaxController@getTask')->name('get-task');

    Route::post('/get-todo'                             , 'AjaxController@getTodo')->name('get-todo');

});
