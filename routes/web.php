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

Route::middleware(['auth'])->group(function () 
{
	Route::get('/','PagesController@index')->name('/');
	Route::get('/two','PagesController@two')->name('two');
	Route::get('/three','PagesController@three')->name('three');
});

Route::get('/add','PagesController@add');

Route::post('/addData','PagesController@addData');

Route::get('/showData','PagesController@showData');

Route::get('/deleteUser/{userId}','PagesController@deleteData');

Route::get('/editUser/{userId}','PagesController@updateData');

Route::get('/updateForm','PagesController@showUpdateForm');

Route::post('/updateUser','PagesController@updateUser');

Route::get('/addAccount','PagesController@addAccount');

Route::post('/storeAccountDetails','PagesController@storeAccountDetails');

Route::get('/showAccountData','PagesController@showAccountData');

Route::get('/editAccount/{accountId}','PagesController@editAccount');

Route::post('/updateAccountDetails','PagesController@updateAccountDetails');

Route::get('/deleteAccount/{accountId}','PagesController@deleteAccount');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
