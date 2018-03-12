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
Route::get('dashboard/invoice', 'PagesController@getInvoice');
Route::get('dashboard', 'PagesController@postDashboard');
Route::get('login', 'PagesController@getLogin');
Route::get('/','PagesController@getIndex' );
