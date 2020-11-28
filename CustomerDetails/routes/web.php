<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'CustomerController@index')->name('customerIndex');
Route::get('/customer/create', 'CustomerController@create')->name('customerCreate');
Route::post('/customer/store', 'CustomerController@store')->name('customerStore');
Route::get('/customer/{customer_id}/edit', 'CustomerController@edit')->name('customerEdit');
Route::put('/customer/{customer_id}/update', 'CustomerController@update')->name('customerUpdate');