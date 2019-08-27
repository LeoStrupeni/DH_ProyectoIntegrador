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

Route::post('/search', 'ProductControler@search')->name('search');

Route::get('/test', function(){
    // dd(Storage::url("images/Bebidas/imgND.jpg"));
    // dd(dirname(__FILE__).Storage::url("images/Bebidas/93e1822cddb2bb95547c0f788b3d68e9.jpg"));
    // dd(dirname(Storage::url("images/Bebidas/93e1822cddb2bb95547c0f788b3d68e9.jpg")));
dd(file_exists('C:\xampp\htdocs\DH_ProyectoIntegrador\public\storage\images\Bebidas\93e1822cddb2bb95547c0f788b3d68e9.jpg'));
    
});