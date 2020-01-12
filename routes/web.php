<?php

use App\Services\Twitter;

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

// app()->singleton('App\Services\Twitter', function() {
//     return new App\Services\Twitter('my-api-key-of-twitter');
// });

/*Route::get('/', function() {
    //dd(app('App\Example'));
    //dd(app('foo'));

    return view('welcome');
});*/



Route::get('/', function(Twitter $twitter) {
    dd ($twitter);
});

/*
GET /projects (index)
GET /projects/create (create)
GET /projects/1 (show)
POST /projects (store)
GET /projects/1/edit (edit)
PATCH /projects/1 (update)
DELETE /prjects/1 (destroy)
*/

Route::resource('projects', 'ProjectsController');
// Route::get('/projects', 'ProjectsController@index'); //fetch me all projects
// Route::get('/projects/create', 'ProjectsController@create'); //fetch me a forme for create a project
// Route::get('/projects/{project}', 'ProjectsController@show'); //display a project
// Route::post('/projects', 'ProjectsController@store'); //persist a project into database
// Route::get('/projects/{project}/eidt', 'ProjectsController@edit'); //display a new form for update a distinct project
// Route::patch('/projects/{project}', 'ProjectsController@update'); //update a project in database
// Route::delete('/projects/{project}', 'ProjectsController@destroy'); //delete a project

Route::patch('/tasks/{task}', 'ProjectTasksController@update');
Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
