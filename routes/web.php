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

Route::any('/', function () {
    return view('index');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/select-pc', function () {
    return view('select-pc-type');
});

Route::any('/select-pc/submit', 'SelectionController@select');