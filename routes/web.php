<?php

use Illuminate\Support\Facades\Route;

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

Route::domain('localhost')->group(function () { 
  
    // Landing Page Routes
    Route::get('/', function () {
        return view('welcome');
    });
    
    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    
    // Catch All Route
    Route::any('{any}', function () {
        abort(404);
    })->where('any', '.*');

});

// Not logged in
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Auth::routes();

// Logged in
Route::get('/home', 'HomeController@index')->name('home');