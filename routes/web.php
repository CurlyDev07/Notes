<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PostController@index');
Route::get('/post/create', 'PostController@create');
Route::post('/post/store', 'PostController@store');
Route::get('/post/show/{id}', 'PostController@show');


Route::get('/register', 'SessionsController@index');
Route::post('/register', 'SessionsController@store');

Route::get('/login', 'SessionsController@login');
Route::post('/login', 'SessionsController@login_store');

Route::get('logout', 'SessionsController@destroy');

Route::post('upload', 'PostController@upload');

Route::get('/destroy_image', 'PostController@destroy_image');

Route::get('/get_img_names', 'PostController@get_uploaded_img_name');
