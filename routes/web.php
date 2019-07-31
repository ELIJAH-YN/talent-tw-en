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

/* EN */

Route::get('index-en', function () {
    return view('official-en/index');
})->name('index-en');

Route::get('/register-en', function () {
    return view('official-en/register');
})->name('register-en');

Route::get('/upload-en', function () {
    return view('official-en/upload');
})->name('upload-en');

/* HK */

Route::get('index-area', function () {
    return view('official-area/index');
})->name('index-area');

Route::get('/register-area', function () {
    return view('official-area/register');
})->name('register-area');

Route::get('/upload-area', function () {
    return view('official-area/upload');
})->name('upload-area');

/* HK-EN */

Route::get('index-area-en', function () {
    return view('official-area-en/index');
})->name('index-area-en');

Route::get('/register-area-en', function () {
    return view('official-area-en/register');
})->name('register-area-en');

Route::get('/upload-area-en', function () {
    return view('official-area-en/upload');
})->name('upload-area-en');


//Route::get('/thankyou', function () {
//    return view('rwd/thankyou');
//})->name('thankyou');


Route::get('mornjoy', function () {
    include public_path().'/dist/index.html';
})->name('mornjoy');

Route::get('/update', 'RegisterController@media')->name('mediaupdate');
Route::post('/register', 'RegisterController@register')->name('register');
Route::post('/upload', 'RegisterController@upload')->name('upload');

Route::get('/update-en', 'RegisterController@mediaen')->name('mediaupdate-en');
Route::post('/register-en', 'RegisterController@registeren')->name('register-en');
Route::post('/upload-en', 'RegisterController@uploaden')->name('upload-en');

Route::get('/update-area', 'RegisterController@mediaarea')->name('mediaupdate-area');
Route::post('/register-area', 'RegisterController@registerarea')->name('register-area');
Route::post('/upload-area', 'RegisterController@uploadarea')->name('upload-area');

Route::get('/update-area-en', 'RegisterController@mediaareaen')->name('mediaupdate-area-en');
Route::post('/register-area-en', 'RegisterController@registerareaen')->name('register-area-en');
Route::post('/upload-area-en', 'RegisterController@uploadareaen')->name('upload-area-en');

