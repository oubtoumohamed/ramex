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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/get_regions', 'Controller@regions')->name('load_regions');

Route::get('/get_villes/', 'Controller@villes')->name('load_villes');


Route::get('/get_students', 'Controller@students')->name('load_students');