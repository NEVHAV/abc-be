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

Route::get('admin', 'Admin\AdminController@index');
Route::get('admin/login', 'Auth\LoginController@showLogin');
Route::get('admin/logout', 'Auth\LoginController@logout');

Route::resource('admin/categories', 'Admin\CategoryController');

Route::resource('admin/users', 'Admin\UserController');

Route::resource('admin/posts', 'Admin\PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('breadcrumbs/{subcate}', 'ABCController@getBreadcrumbs');

