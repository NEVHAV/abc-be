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

Route::get('test', function () {
    return view('welcome');
});

Route::get('home', function (){
    return view('index');
});

Route::get('/', function () {
    return view('index');
});

Route::get('categories', 'ABCController@getCategories');
Route::get('subcategories/{cate}', 'ABCController@getSubcategories');
Route::get('post/{cate}/{sub?}', 'ABCController@getPost');
Route::get('latestPosts', 'ABCController@getLatestPosts');

Route::get('admin', 'AdminController@index'); 
Route::get('admin/login', 'Auth\LoginController@showLogin'); 
Route::get('admin/logout', 'Auth\LoginController@logout');

Route::get('admin/categories', 'AdminController@showCategory');
Route::get('admin/categories/add', 'AdminController@addCategory');
Route::get('admin/categories/edit', 'AdminController@editCategory');

Route::get('admin/users', 'AdminController@showUser');
Route::get('admin/users/add', 'AdminController@addUser');
Route::get('admin/users/edit', 'AdminController@editUser');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
