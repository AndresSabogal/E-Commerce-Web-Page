<?php

use App\Product;
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
Route::resource('users', 'UsersController')->middleware('role:admin,manager');
Route::resource('roles', 'RolesController')->middleware('can:isAdmin');



Route::get('/','HomeController@index');
Route::get('/test','DashboardController@index');
Auth::routes(['verify'=> true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::resource('/products','ProductsController')->middleware('auth')->middleware('verified');
Route::resource('/productsCategory','ProductsCategoryController')->middleware('auth')->middleware('verified');

Route::get('userViews',function(){
    $products=Product::all();

    return view('userViews/index',['products'=>$products]);
});


Route::get('userViews.show','BuscarController@busqueda');
