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

/*Route::get('/', function () {
    return view('welcome');
});


Route::resource('ItemsSharingPages','ItemsSharingController');*/

// Route::get('manage-item-ajax', 'ItemAjaxController@manageItemAjax');
 // Route::resource('item-ajax', 'ItemAjaxController');

 Route::get('manage-user-ajax', 'UserAjaxController@manageUserAjax');
 Route::resource('user-ajax', 'UserAjaxController');