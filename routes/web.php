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

Route::get('/', 'Front\HomeController@index')->name("front.home");
Route::get('/contactus', 'Front\ContactUsController@index')->name("front.contactus");
Route::get('/aboutus', 'Front\AboutUsController@index')->name("front.aboutus");
Route::get('/search', 'Front\SearchController@index')->name("front.search");
Route::get('/privacy', 'Front\PrivacyController@index')->name("front.privacy");
Route::get('/conditions', 'Front\TermsAndContitionsController@index')->name("front.termsconditions");
Route::resource('/property', 'Front\PropertyController'); 

//--------------------------------------------------------
//BACKOFFICE
//--------------------------------------------------------
Route::get('back/', 'HomeController@index')->name('home'); 

Route::resource('back/product','ProductsController');
Route::resource('back/product_contract', 'ProductContractController');
Route::get('back/product/{product}/features', ['uses' =>'ProductsController@updateFeatures'])->name('product.update.features');
Route::get('back/product/filter/fields',['uses'=> 'ProductsController@getFields'])->name('product.filter.fields');


Route::resource('back/contact','ContactsController');
Route::resource('back/language','LanguagesController');  
Route::resource('back/user','UserController'); 

//USER CONTROLLER;


//TASK CONTROLLER;
Route::resource('back/task','TaskController'); 
Route::post('back/task/calendar/update', ['uses' =>'TaskController@updateCalendar'])->name('task.calendar.update');
Route::get('back/task/calendar/search', ['uses' =>'TaskController@search'])->name('task.search');

Route::get('back/task/contact/{id}', ['uses' =>'TaskController@contactTasks'])->name('contact.task');
Route::get('back/task/user/{id}',['uses' =>'TaskController@userTasks'])->name('user.task');
Route::get('back/task/product/{id}',['uses' =>'TaskController@productTasks'])->name('product.task');

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

//FEATURES
Route::resource('back/feature', 'FeatureController');

//CONTACT STEP
Route::put('back/contact/{id}/step/update', ['uses' =>'ContactsController@stepUpdate'])->name('contact.step');
Auth::routes('back');

//TEMPLATE CONTROL
Route::resource('back/contracttemplate', 'ContractTemplateController');