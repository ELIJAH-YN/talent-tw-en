<?php

use App\Exports\UserExport;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Sitemap\SitemapGenerator;

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

/*   TW   */
Route::get('/', function () {
    return view('official.index');
})->name('index');

Route::get('global-talent-registration', function () {
    return view('official.register');
})->name('global-talent-registration');

Route::get('global-talent-upload', function () {
   return view('official.upload');
})->name('global-talent-upload');

Route::get('global-talent-rules', function () {
    return view('official.storage');
})->name('global-talent-rules');

/*   EN   */
Route::get('/en', function () {
    return view('official-en.index');
})->name('/en');

Route::get('en/global-talent-registration', function () {
    return view('official-en.register');
})->name('en/global-talent-registration');

Route::get('en/global-talent-upload', function () {
    return view('official-en.upload');
})->name('en/global-talent-upload');

Route::get('en/global-talent-rules', function () {
    return view('official-en.storage');
})->name('en/global-talent-rules');

/*   VN   */
Route::get('/vn', function () {
    return view('official-vn.index');
})->name('/vn');

Route::get('vn/global-talent-registration', function () {
    return view('official-vn.register');
})->name('vn/global-talent-registration');

Route::get('vn/global-talent-upload', function () {
    return view('official-vn.upload');
})->name('vn/global-talent-upload');

Route::get('vn/global-talent-rules', function () {
    return view('official-vn.storage');
})->name('vn/global-talent-rules');

/*   TH   */
Route::get('/th', function () {
    return view('official-th.index');
})->name('/th');

Route::get('th/global-talent-registration', function () {
    return view('official-th.register');
})->name('th/global-talent-registration');

Route::get('th/global-talent-upload', function () {
    return view('official-th.upload');
})->name('th/global-talent-upload');

Route::get('th/global-talent-rules', function () {
    return view('official-th.storage');
})->name('th/global-talent-rules');

/*     Read Destroy     */
//Route::get('getdb', 'RegisterController@getData');
//Route::get('getuser', 'RegisterController@getUser');
//Route::post('destroy/{id}', 'RegisterController@destroy');
//Route::post('destroyuser/{id}', 'RegisterController@destroyuser');
//Route::resource('getdb','RegisterController');

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

/*    VN    */
Route::get('/update-vn', 'RegisterController@mediavn')->name('mediaupdate-vn');
Route::post('/register-vn', 'RegisterController@registervn')->name('registe-vn');
Route::post('/upload-vn', 'RegisterController@uploadvn')->name('upload-vn');

/*    VN    */
Route::get('/update-th', 'RegisterController@mediath')->name('mediaupdate-th');
Route::post('/register-th', 'RegisterController@registerth')->name('registe-th');
Route::post('/upload-th', 'RegisterController@uploadth')->name('upload-th');
