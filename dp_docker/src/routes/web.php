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
Route::get('/post/{slug}/delete', 'App\Http\Controllers\PostsController@delete');

Route::put('/post/{slug}/edit', 'App\Http\Controllers\PostsController@update');

Route::get('/post/{slug}/edit', 'App\Http\Controllers\PostsController@edit');

Route::get('/post/{slug}', 'App\Http\Controllers\PostsController@show');

Route::post('/create-post', 'App\Http\Controllers\PostsController@store');

Route::get('/create-post', 'App\Http\Controllers\PostsController@create');

Route::get('/about', 'App\Http\Controllers\PagesController@getAbout');

Route::get('/', 'App\Http\Controllers\PagesController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
