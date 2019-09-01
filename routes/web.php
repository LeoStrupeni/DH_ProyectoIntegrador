<?php

Route::get('/', 'IndexController@dataIndex');

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'ProductControler@search')->name('search');


Route::get('/detail', 'ProductControler@detail')->name('detail');

Route::post('/add/query', 'QueryController@add')->name('add-query');

Route::post('/add/suscriptor', 'SuscriptorController@add')->name('add-suscriptor');

Route::get('/profile/{user}', 'UserController@profile')->name('profile');

Route::patch('/profile/{user}/update', 'UserController@update')->name('user-update');