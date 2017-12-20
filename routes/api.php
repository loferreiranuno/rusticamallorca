<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 

Route::post('/api/search/cities', 'Front\SearchController@cities')->name("front.api.cities");
Route::post('/api/set_language', 'Front\HomeController@setLanguage')->name("front.api.setLanguage");
Route::post('/api/add/bookmark/', 'Front\BookmarkController@bookMark')->name("front.api.addBookmark");
Route::post('/api/add/compare/', 'Front\BookmarkController@compare')->name("front.api.addCompare");


