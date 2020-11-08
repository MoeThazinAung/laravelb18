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

// Route::get('/','MainController@welcome')->name('welcome');

// Route::get('testing','MainController@testing')->name('testing');

// Route::get('about','MainController@about')->name('aboutpage');

// Route::get('contact','MainController@contact')->name('contactpage');

Route::middleware('role:admin')->group(function () {
// CRUD Process (Item Management)
Route::resource('brand','BrandController');//get,post,put,delete

Route::resource('category','CategoryController');

Route::resource('subcategory','SubcategoryController');

Route::resource('item','ItemController');

Route::post('filter', 'ItemController@filterCategory')->name('filterCategory');
});

// Frontend with items
Route::get('/', 'FrontendController@home')->name('mainpage');
Route::get('userlogin', 'FrontendController@userlogin')->name('userlogin');
Route::get('userregister', 'FrontendController@userregister')->name('userregister');

Route::get('itemdetail/{id}','FrontendController@itemdetail')->name('itemdetail');

Route::get('cart','FrontendController@cart')->name('cartpage');

Route::resource('order', 'OrderController');

Route::post('confirm/{id}', 'OrderController@confirm')->name('order.confirm');

Route::get('itembysubcategory/{id}','FrontendController@itembysubcategory')->name('itembysubcategory');

Route::resource('user', 'UserController');

Auth::routes(['register'=>false]); //

Route::get('/home', 'HomeController@index')->name('home');
