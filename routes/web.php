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
    return view('rwd/news');
})->name('news');

Route::get('/home', function () {
    return view('rwd/home');
})->name('index');

Route::get('/register', function () {
    return view('rwd/register');
})->name('register');


Route::get('/upload', function () {
    return view('rwd/upload');
})->name('upload');

Route::get('/thankyou', function () {
    return view('rwd/thankyou');
})->name('thankyou');


/*============= EN =================*/

Route::get('/homeen', function () {
    return view('rwden/home');
})->name('homeen');

Route::get('registeren', function () {
    return view('rwden/register');
})->name('registeren');

Route::get('uploaden', function () {
    return view('rwden/upload');
})->name('uploaden');

Route::get('/thankyouen', function () {
    return view('rwden/thankyou');
})->name('thankyouen');



Route::get('/update', 'RegisterController@media')->name('mediaupdate');
Route::post('/register', 'RegisterController@register')->name('register');
Route::post('/upload', 'RegisterController@upload')->name('upload');
/*============== EN =============*/
Route::get('updateen', 'RegisterController@mediaen')->name('mediaupdateen');
Route::post('/registeren', 'RegisterController@registeren')->name('registeren');
Route::post('uploaden', 'RegisterController@uploaden')->name('uploaden');
