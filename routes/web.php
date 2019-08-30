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

Route::get('/', 'IndexController@dataIndex');

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'ProductControler@search')->name('search');

Route::get('/profile', 'UserController@profile')->name('profile');

Route::get('/detail', 'ProductControler@detail')->name('detail');

Route::post('/add', 'QueryController@add')->name('add');