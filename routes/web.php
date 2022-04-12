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





// Route::get('/', function () {

//     return view('welcome');
// });


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/configuracion', 'UserController@config')->name('config');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');

Route::get('/subir-imagen', 'ImageController@create')->name('image.create');
Route::post('/guardar/imagen', 'ImageController@save')->name('image.save');

Route::get('/image/file/{filename}', 'ImageController@getImage')->name('image.file');
Route::get('/image/{id}', 'ImageController@detail')->name('image.detail');

Route::post('/comment/save', 'CommentController@store')->name('comment.save');
Route::get('/comment/delete/{id}', 'CommentController@delete')->name('comment.delete');
