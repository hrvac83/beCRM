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
Route::resource('dashboard/items', 'ItemController');
Route::get('dashboard/invoice/newinvoice', 'PagesController@getNewInvoice');
Route::get('dashboard/invoice', 'PagesController@getInvoice');
Route::get('dashboard', 'PagesController@getDashboard');
Route::get('login', 'PagesController@getLogin');
Route::get('/','PagesController@getIndex' );



