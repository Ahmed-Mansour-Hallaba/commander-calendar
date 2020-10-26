<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/form',function (){
    return view('template.form');
});

Route::get('/table',function (){
    return view('template.table');
});

Route::get('/blank',function (){
    return view('template.blank');
});

Route::get('login', 'AuthController@index');
Route::post('post-login', 'AuthController@postLogin');
Route::get('/', 'AuthController@dashboard')->middleware('checkLogin');
Route::get('logout', 'AuthController@logout');
Route::middleware('checkLogin')->group(function () {
    //Tasks routes

    Route::post('/changepassword','AuthController@changePassword');
    Route::get('/today', 'TasksController@index');
    Route::get('tasks', 'TasksController@all');
    Route::get('newtask', 'TasksController@create');
    Route::post('savetask', 'TasksController@store');
    Route::get('finishtask/{uid}/{tid}', 'TasksController@finishTask');
//    Route::get('/transfertask/{tid}/{f_id}/{t_id}/{desc?}','TasksController@transferTask');
    Route::post('/transfertask','TasksController@transferTask');
    Route::get('/edittask/{id}','TasksController@edit');
    Route::post('/updatetask','TasksController@update');
    Route::get('/calendar','TasksController@calendar');

    //users routes
    Route::get('/users','UsersController@index');
    Route::get('/createuser','UsersController@create');
    Route::post('/storeuser',"UsersController@store");
    Route::get('/deleteuser/{id}','UsersController@delete');
});

