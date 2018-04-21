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

Route::get('/','PagesController@index');

Route::get('/two','PagesController@two');

Route::get('/three','PagesController@three');

Route::get('/add','PagesController@add');

Route::post('/addData','PagesController@addData');

Route::get('/showData','PagesController@showData');

Route::get('/deleteUser/{userId}','PagesController@deleteData');

Route::get('/editUser/{userId}','PagesController@updateData');

Route::get('/updateForm','PagesController@showUpdateForm');

Route::post('/updateUser','PagesController@updateUser');
