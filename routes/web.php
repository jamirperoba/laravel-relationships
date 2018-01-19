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

//ONTE TO ONE

 $this->get('one-to-one','OneToOneController@oneToOne');
 $this->get('one-to-one-inverse','OneToOneController@oneToOneInverse');

Route::get('/', function () {
    return view('welcome');
});