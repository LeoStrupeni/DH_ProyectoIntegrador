<?php

Route::get('/', 'IndexController@dataIndex')->name('home');

Route::get('/countries', 'IndexController@countries');

Route::get('/profiles', 'ProfilesController@index');

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');


Route::get('/search', 'ProductController@search')->name('search');

Route::get('/detail', 'ProductController@detail')->name('detail');

Route::resource('users', 'UsersController');

Route::post('/checkemail', 'UsersController@checkEmail');

Route::resource('suscriptors', 'SuscriptorsController');

Route::post('/checkSuscriptorEmail', 'SuscriptorsController@checkEmail');

Route::resource('queries', 'QueriesController');

Route::resource('products', 'ProductController');

Route::get('/faq', 'FaqController@show')->name('faq');

Route::get('/shopcart', 'ShopCartController@show')->name('shopcart')->middleware('auth');

Route::get('/shopcart/add', 'ShopCartController@add')->name('shopcartadd')->middleware('auth');

Route::get('/shopcart/delete', 'ShopCartController@delete')->name('shopcartdelete')->middleware('auth');

Route::get('/shopcart/trash', 'ShopCartController@trash')->name('cartTrash')->middleware('auth');

Route::get('/pay', 'SalesController@store')->name('pay')->middleware('auth');
