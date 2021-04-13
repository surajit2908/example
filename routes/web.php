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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/dashboard', 'HomeController@dashboard')->name('user.dashboard')->middleware('auth');

Route::get('/login/admin', 'Admin\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Admin\LoginController@adminLogin');


Route::group([
	'middleware' => ['auth:admin'], 'prefix' => 'admin'
], function () {
	Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'Admin\DashboardController@index']);
	Route::post('logout', ['as' => 'admin.logout', 'uses' => 'Admin\DashboardController@logout']);

	Route::get('category-tree-view',['as' => 'category', 'uses'=>'Admin\CategoryController@manageCategory']);
	Route::post('add-category',['as'=>'add.category','uses'=>'Admin\CategoryController@addCategory']);


	Route::get('category-list',['as'=>'category.list','uses'=>'Admin\CategoryController@index']);
	Route::get('category-edit/{id}',['as'=>'category.edit','uses'=>'Admin\CategoryController@edit']);
	Route::put('category-update/{id}',['as'=>'category.update','uses'=>'Admin\CategoryController@update']);
	Route::get('category-delete/{id}',['as'=>'category.delete','uses'=>'Admin\CategoryController@destroy']);



	Route::get('products-list',['as'=>'products.index','uses'=>'Admin\ProductController@index']);
	Route::get('products-create',['as'=>'products.create','uses'=>'Admin\ProductController@create']);
	Route::post('products-store',['as'=>'products.store','uses'=>'Admin\ProductController@store']);
	Route::get('products-edit/{id}',['as'=>'products.edit','uses'=>'Admin\ProductController@edit']);
	Route::put('products-update/{id}',['as'=>'products.update','uses'=>'Admin\ProductController@update']);
	Route::get('products-delete/{id}',['as'=>'products.delete','uses'=>'Admin\ProductController@destroy']);

});