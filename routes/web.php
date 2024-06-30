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

    Route::get('/login'                         , 'ViewController@login')->name('login');

    Route::get('/download-cv'                   , 'PDFController@generatePDF')->name('my-cv');

    Route::get('/print-cv'                      , 'PDFController@printPDF')->name('print-cv');

    /*
    ----------------------------------------------------------------------------------------------------------
    AJAX CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */

    /*
    ----------------------------------------------------------------------------------------------------------
                                                    MESSAGE SEND
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/client-message-send'          , 'AjaxController@clientSendMessage')->name('client-message-send');
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
    Route::post('/sign-in'                           , 'AuthController@dologin')->name('sign-in');
});

/*
----------------------------------------------------------------------------------------------------------
BACK END ROUTES WITH LOGIN VALIDATE
----------------------------------------------------------------------------------------------------------
*/

Route::group([
    'middleware'=>['App\Http\Middleware\Login','App\Http\Middleware\PermissionAuthentication'],
    'namespace'=>'App\Http\Controllers',
],function ($router) {


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

    Route::get('/site-settings'                     , 'ViewController@siteSettings')->name('site-settings');

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

    Route::get('/project-publish'                   , 'ViewController@projectPublish')->name('project-publish');


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
                                                    MAILBOX
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/mailbox'                           , 'ViewController@mailBox')->name('mailbox');


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    FINANCE
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/bank-account-details'              , 'ViewController@bankAccountDetails')->name('bank-account-details');

    Route::get('/income-types'                      , 'ViewController@incomeTypes')->name('income-types');

    Route::get('/expense-types'                     , 'ViewController@expenseTypes')->name('expense-types');

    Route::get('/view-create-income'                , 'ViewController@createIncome')->name('view-create-income');

    Route::get('/view-income'                       , 'ViewController@viewIncome')->name('view-income');

    Route::get('/edit-income/{id?}'                 , 'ViewController@editIncome')->name('edit-income');

    Route::get('/view-create-expense'               , 'ViewController@createExpense')->name('view-create-expense');

    Route::get('/view-expense'                      , 'ViewController@viewExpense')->name('view-expense');

    Route::get('/edit-expense/{id?}'                , 'ViewController@editExpense')->name('edit-expense');

    Route::get('/bank-statement'                    , 'ViewController@bankStatement')->name('bank-statement');

    Route::get('/view-transaction/{transaction_id?}/{transaction_type?}'                    , 'ViewController@viewTransaction')->name('view-transaction');




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

    Route::post('/portfolio-project-publish'        , 'ActionController@projectPublish')->name('portfolio-project-publish');


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
                                                    FINANCE
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/create-bank-account'              , 'ActionController@createBankAccount')->name('create-bank-account');

    Route::post('/edit-bank-account'                , 'ActionController@editBankAccount')->name('edit-bank-account');

    Route::post('/create-income-type'               , 'ActionController@createIncomeType')->name('create-income-type');

    Route::post('/edit-income-type'                 , 'ActionController@editIncomeType')->name('edit-income-type');

    Route::post('/create-expense-type'              , 'ActionController@createExpenseType')->name('create-expense-type');

    Route::post('/edit-expense-type'                , 'ActionController@editExpenseType')->name('edit-expense-type');

    Route::post('/create-income'                    , 'ActionController@createIncome')->name('create-income');

    Route::post('/update-income/{id?}'              , 'ActionController@updateIncome')->name('update-income');

    Route::post('/create-expense'                   , 'ActionController@createExpense')->name('create-expense');

    Route::post('/update-expense/{id?}'             , 'ActionController@updateExpense')->name('update-expense');






    /*
    ----------------------------------------------------------------------------------------------------------
    AJAX CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */

    Route::get('/get-navbar-details'                    , 'AjaxController@navBarDetails')->name('get-navbar-details');


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


    /*
    ----------------------------------------------------------------------------------------------------------
                                                    MAIL BOX
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/client-message-get'                   , 'AjaxController@getClientMessage')->name('client-message-get');

    Route::post('/client-message-markas-read'           , 'AjaxController@clientMessageMarkAsRead')->name('client-message-markas-read');

     /*
    ----------------------------------------------------------------------------------------------------------
                                                    FINANCE
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/get-income'                           , 'AjaxController@getIncome')->name('get-income');

    Route::post('/get-expense'                          , 'AjaxController@getExpense')->name('get-expense');

    Route::post('/get-bank-statement'                   , 'AjaxController@getBankStatement')->name('get-bank-statement');

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
    ACTION CONTROLLER
    ----------------------------------------------------------------------------------------------------------
    */

    Route::post('/create-site-settings'                 , 'ActionController@createSiteSettings')->name('create-site-settings');
});
