<?php

use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
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


/* VN */

Route::get('index-vn', function () {
    return view('official-vn/index');
})->name('index-vn');

Route::get('/register-vn', function () {
    return view('official-vn/register');
})->name('register-vn');

Route::get('/upload-vn', function () {
    return view('official-vn/upload');
})->name('upload-vn');

/* TH */

Route::get('index-th', function () {
    return view('official-th/index');
})->name('index-th');

Route::get('/register-th', function () {
    return view('official-th/register');
})->name('register-th');

Route::get('/upload-th', function () {
    return view('official-th/upload');
})->name('upload-th');


//Route::get('/thankyou', function () {
//    return view('rwd/thankyou');
//})->name('thankyou');


Route::get('mornjoy', function () {
    include public_path().'/dist/index.html';
})->name('mornjoy');

/* Export CSV */
Route::get('download', function () {
   return Excel::download(new UserExport, 'candidates.xlsx');
});

/*    TW    */
Route::get('/update', 'RegisterController@media')->name('mediaupdate');
Route::post('/register', 'RegisterController@register')->name('register');
Route::post('/upload', 'RegisterController@upload')->name('upload');

/*    EN    */
Route::get('/update-en', 'RegisterController@mediaen')->name('mediaupdate-en');
Route::post('/register-en', 'RegisterController@registeren')->name('register-en');
Route::post('/upload-en', 'RegisterController@uploaden')->name('upload-en');

/*    HK    */
Route::get('/update-area', 'RegisterController@mediaarea')->name('mediaupdate-area');
Route::post('/register-area', 'RegisterController@registerarea')->name('register-area');
Route::post('/upload-area', 'RegisterController@uploadarea')->name('upload-area');

/*    HK-EN    */
Route::get('/update-area-en', 'RegisterController@mediaareaen')->name('mediaupdate-area-en');
Route::post('/register-area-en', 'RegisterController@registerareaen')->name('register-area-en');
Route::post('/upload-area-en', 'RegisterController@uploadareaen')->name('upload-area-en');

/*    VN    */
Route::get('/update-vn', 'RegisterController@mediavn')->name('mediaupdate-vn');
Route::post('/register-vn', 'RegisterController@registervn')->name('registe-vn');
Route::post('/upload-vn', 'RegisterController@uploadvn')->name('upload-vn');

/*    VN    */
Route::get('/update-th', 'RegisterController@mediath')->name('mediaupdate-th');
Route::post('/register-th', 'RegisterController@registerth')->name('registe-th');
Route::post('/upload-th', 'RegisterController@uploadth')->name('upload-th');
