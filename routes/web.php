<?php

Route::get('/', 'IndexController@dataIndex');

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'ProductsController@search')->name('search');

Route::get('/detail', 'ProductsController@detail')->name('detail');

Route::resource('users', 'UsersController');

Route::resource('suscriptors', 'SuscriptorsController');

Route::resource('queries', 'QueriesController');

Route::resource('products', 'ProductsController');