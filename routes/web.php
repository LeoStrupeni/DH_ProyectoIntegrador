<?php

Route::get('/', 'IndexController@dataIndex');

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'ProductControler@search')->name('search');

Route::get('/detail', 'ProductControler@detail')->name('detail');

Route::resource('users', 'UsersController');

Route::resource('suscriptors', 'SuscriptorsController');

Route::resource('queries', 'QueriesController');