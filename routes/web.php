<?php

Route::get('/', 'IndexController@dataIndex');

Route::get('/countries', 'IndexController@countries');

Route::get('/profiles', 'ProfilesController@index');

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'ProductController@search')->name('search');

Route::get('/detail', 'ProductController@detail')->name('detail');

Route::resource('users', 'UsersController');

Route::resource('suscriptors', 'SuscriptorsController');

Route::resource('queries', 'QueriesController');

Route::resource('products', 'ProductController');

Route::get('/faq', 'FaqController@show')->name('faq');

Route::get('/shopcart', 'ShopCartController@show')->name('shopcart');

Route::get('/shopcart/add','ShopCartController@add')->name('shopcartadd');

Route::get('/shopcart/delete','ShopCartController@delete')->name('shopcartdelete');

Route::get('/shopcart/trash','ShopCartController@trash')->name('cartTrash');

Route::get('/pay','SalesController@store')->name('pay');
