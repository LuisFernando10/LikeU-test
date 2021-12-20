<?php

use Illuminate\Http\Request;


Route::get('clients/list/', 'ClientController@index');
Route::post('clients/create/', 'ClientController@create');
Route::put('clients/update/{id}', 'ClientController@update');
