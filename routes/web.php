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
    return redirect('login');
});

Route::get('/home', function () {
    return redirect()->route('website.index');
})->name('home');

Auth::routes(['verify' => true]);

// Administration
Route::get('/websites', 'Admin\WebsiteController@index')->name('website.index');
Route::get('/websites/create', 'Admin\WebsiteController@create')->name('website.create');
Route::get('/websites/{website}', 'Admin\WebsiteController@edit')->name('website.edit');
Route::post('/websites/create', 'Admin\WebsiteController@store')->name('website.store');
Route::patch('/websites/{website}', 'Admin\WebsiteController@update')->name('website.update');
Route::delete('/websites/{website}', 'Admin\WebsiteController@destroy')->name('website.destroy');

// Website frontend
Route::get('/page/{slug}', 'FrontendController@show')->name('website.show');