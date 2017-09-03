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
Route::get('back/product/{product}/features', ['uses' =>'ProductsController@updateFeatures'])->name('product.update.features');



Route::resource('back/contact','ContactsController');
Route::resource('back/language','LanguagesController'); 
Route::resource('back/language','LanguagesController'); 
Route::resource('back/user','UserController'); 

//USER CONTROLLER;


//TASK CONTROLLER;
Route::resource('back/task','TaskController'); 
Route::post('back/task/calendar/update', ['uses' =>'TaskController@updateCalendar'])->name('task.calendar.update');
Route::get('back/task/calendar/search', ['uses' =>'TaskController@search'])->name('task.search');

Route::post('back/task/done', ['uses' =>'TaskController@done'])->name('task.done'); 

//OFFER CONTROLLER;
Route::resource('back/offer','ProductOfferController'); 
Route::post('/back/offer/{offer}/status/rented', ['uses' =>'ProductOfferController@markAsRented'])->name('offer.rented');
Route::post('/back/offer/{offer}/status/rejected', ['uses' =>'ProductOfferController@markAsRejected'])->name('offer.rejected');
Route::post('/back/offer/{offer}/status/sold', ['uses' =>'ProductOfferController@markAsSold'])->name('offer.sold');

//IMAGES CONTROLLER;
Route::get('/back/product/{product}/photo', ['uses' =>'PhotoController@index'])->name('photo.show');
Route::get('/back/product/{product}/photo_properties', ['uses' =>'PhotoController@properties'])->name('photo.properties');
Route::get('/back/product/{product}/photo.json', ['uses' =>'PhotoController@get'])->name('photo.get');
Route::post('/back/product/photo/upload', ['uses' =>'PhotoController@upload'])->name('photo.upload');
Route::delete('/back/product/photo/delete', ['uses' =>'PhotoController@delete'])->name('photo.delete');
Route::post('/back/product/photo/update', ['uses' =>'PhotoController@update'])->name('photo.update');

//DOCUMENTS CONTROLLER
Route::resource('back/document', 'ProductDocumentController');

//CONTACT INTEREST 
Route::resource('back/contact/interest', 'ContactInterestController');

//CONTACT WISH LIST
Route::resource('back/contact/wishlist', 'ContactWishListController');

//CONTACT STEP
Route::put('back/contact/{id}/step/update', ['uses' =>'ContactsController@stepUpdate'])->name('contact.step');
Auth::routes('back');