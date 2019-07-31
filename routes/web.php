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
    return view('official/index');
})->name('index');

Route::get('/register', function () {
    return view('official/register');
})->name('register');

Route::get('/upload', function () {
    return view('official/upload');
})->name('upload');

//Route::get('/thankyou', function () {
//    return view('rwd/thankyou');
//})->name('thankyou');

Route::get('storage', function () {
    return view('official/storage');
})->name('storage');


Route::get('mornjoy', function () {
    include public_path().'/dist/index.html';
})->name('mornjoy');

Route::get('/update', 'RegisterController@media')->name('mediaupdate');
Route::post('/register', 'RegisterController@register')->name('register');
Route::post('/upload', 'RegisterController@upload')->name('upload');
