<?php

use Illuminate\Http\Request;


Route::get('clients', 'ClientController@index');
Route::post('clients', 'ClientController@create');
