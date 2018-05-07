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

Route::get('api/categories', 'ABCController@getCategories');
Route::get('api/subcategories/{cate}', 'ABCController@getSubcategories');
Route::get('api/posts/{cate}/{sub?}', 'ABCController@getPosts');
Route::get('api/latestPosts', 'ABCController@getLatestPosts');

//postView
Route::get('api/postDetail/{postId}', 'ABCController@getPostDetail');
Route::get('api/breadcrumbs/{subcate}', 'ABCController@getBreadcrumbs');

//submenuView
Route::get('api/submenu/{subId}', 'ABCController@getSubmenu');


Route::get('admin', 'Admin\AdminController@index');
Route::get('admin/login', 'Auth\LoginController@showLogin');
Route::get('admin/logout', 'Auth\LoginController@logout');

Route::resource('admin/categories', 'Admin\CategoryController');

Route::resource('admin/users', 'Admin\UserController');

Route::resource('admin/posts', 'Admin\PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

