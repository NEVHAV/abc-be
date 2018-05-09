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

Route::get('api/{lang}/categories', 'ABCController@getCategories');
Route::get('api/{lang}/subcategories/{cate}', 'ABCController@getSubcategories');
Route::get('api/{lang}/posts/{cate}/{sub?}', 'ABCController@getPosts');
Route::get('api/{lang}/latestPosts', 'ABCController@getLatestPosts');

//postView
Route::get('api/{lang}/postDetail/{postId}', 'ABCController@getPostDetail');
Route::get('api/{lang}/breadcrumbs/{subcate}', 'ABCController@getBreadcrumbs');

//submenuView
Route::get('api/{lang}/submenu/{subId}', 'ABCController@getSubmenu');


Route::get('admin', 'Admin\AdminController@index');
Route::get('admin/login', 'Auth\LoginController@showLogin');
Route::get('admin/logout', 'Auth\LoginController@logout');

Route::resource('admin/categories', 'Admin\CategoryController');

Route::resource('admin/users', 'Admin\UserController');

Route::resource('admin/posts', 'Admin\PostController');

Route::resource('admin/subcategories', 'Admin\SubCategoryController');

Route::post('admin/api/uploadimage', 'Admin\UploadImageController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

