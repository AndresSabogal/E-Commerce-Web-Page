<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

// Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home/{id}', 'HomeController@show');
Route::get('admin', 'AdminController@index');
Route::resource('posts', 'PostsController');
Route::resource('users', 'UsersController')->middleware('role:admin,manager');
Route::resource('roles', 'RolesController')->middleware('can:isAdmin');



Route::get('/','HomeController@index');
Route::get('/test','DashboardController@index');
Auth::routes(['verify'=> true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::resource('/usuarios','UsersController')->middleware('auth')->middleware('verified');
