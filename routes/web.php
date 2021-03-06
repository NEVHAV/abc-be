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

Route::get('post/{slug}', function (){
    return view('index');
});

Route::get('topic/{slug}/{subTopic?}', function (){
    return view('index');
});

Route::get('/', function () {
    return view('index');
});

Route::get('api/{lang}/categories', 'ABCController@getCategories');
Route::get('api/{lang}/subcategories/{cate}', 'ABCController@getSubcategories');
//Route::get('api/{lang}/posts/{cate}/{sub?}', 'ABCController@getPosts');
Route::get('api/{lang}/latestPosts', 'ABCController@getLatestPosts');
Route::get('api/{lang}/advertisement', 'ABCController@getAdvertisement');
Route::get('api/{lang}/info', 'ABCController@getInfo');

//postView
Route::get('api/{lang}/postDetail/{postId}', 'ABCController@getPostDetail');
Route::get('api/{lang}/breadcrumbs/{subcate}', 'ABCController@getBreadcrumbs');

//submenuView
Route::get('api/{lang}/submenu/{subId}', 'ABCController@getSubmenu');

Route::get('api/{lang}/posts/{slug}', 'PostController@show');
Route::get('api/{lang}/topics/{slug}/{subTopic?}', 'TopicController@show');
Route::get('api/{lang}/topics', 'TopicController@index');

Route::get('api/{lang}/home', 'HomeController@index');


Route::get('admin', 'Admin\AdminController@index');
Route::get('admin/login', 'Auth\LoginController@showLogin');
Route::get('admin/logout', 'Auth\LoginController@logout');

Route::resource('admin/categories', 'Admin\CategoryController');

Route::resource('admin/users', 'Admin\UserController');

Route::resource('admin/posts', 'Admin\PostController');

Route::resource('admin/company-info', 'Admin\InfoController');

Route::resource('admin/subcategories', 'Admin\SubCategoryController');

Route::resource('admin/advertisements', 'Admin\AdvertisementController');

Route::resource('admin/settings', 'Admin\PasswordController');

Route::resource('admin/message','Admin\ChatController');

Route::post('admin/categories/{id}/pinpost', 'Admin\CategoryController@pinPost');

Route::post('admin/categories/{id}/unpinpost', 'Admin\CategoryController@unpinPost');
//Route::post('admin/api/uploadimage', 'Admin\UploadImageController@store');

Route::post('admin/categories/{id}/pinpostjp', 'Admin\CategoryController@pinPostJp');

Route::post('admin/categories/{id}/unpinpostjp', 'Admin\CategoryController@unpinPostJp');

Route::post('admin/api/uploadimage/{path}', 'Admin\UploadImageController@store');
Route::patch('admin/api/uploadimage/{path}', 'Admin\UploadImageController@store');

Route::delete('admin/api/uploadimage/storage/{path}/{name}', 'Admin\UploadImageController@destroy');

Auth::routes();

//chat
Route::get('messages', 'ChatsController@getMessages');
Route::post('messages', 'ChatsController@postMessages');