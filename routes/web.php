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


Route::get('/', function () {
    return view('welcome');
});

// Route::namespace('Todo')->group(function(){
//     Route::get('/todo' , 'todoController@index')->name('todo.index');
//     Route::post('/todo' , 'todoController@store')->name('todo.store');
//     Route::get('/todo/create' , 'todoController@create')->name('todo.create');
//     Route::get('/todo/{id}' , 'todoController@show')->name('todo.show');
//     Route::put('/todo/{id}' , 'todoController@update')->name('todo.update');
//     Route::delete('/todo/{id}' , 'todoController@destroy')->name('todo.destroy');
//     Route::get('/todo/{id}/edit' , 'todoController@edit')->name('todo.edit');
//     Route::get('/todo/complete/{id}' , 'todoController@complete')->name('todo.complete');
// });

Route::namespace('Todo')->group(function(){
        Route::resource('/todo', 'todoController');
        Route::get('/todo/complete/{id}' , 'todoController@complete')->name('todo.complete');

});

