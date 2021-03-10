<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{lang?}','PostController@index')->where('lang', '[A-Za-z]+');
Route::get('/home/{lang?}','PostController@index')->where('lang', '[A-Za-z]+');
Route::post('/post/store','PostController@store')->name('post.store');
Route::post('/ajaxRequest', 'AjaxController@ajaxRequestPost')->name('ajaxRequest.post');






