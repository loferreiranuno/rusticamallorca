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

Route::get('/', function () {
    return redirect('back/');
});

Route::get('back/', 'HomeController@index')->name('home');

Route::resource('back/product','ProductsController');
Route::resource('back/contact','ContactsController');
Route::resource('back/language','LanguagesController');

Auth::routes('back');