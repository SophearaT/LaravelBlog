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


	
	// Route::get('auth/login','Auth\LoginController@getLogin');
	// Route::Post('auth/login','Auth\LoginController@postLogin');
	// Route::get('auth/logout','Auth\LoginController@getLogout');
	// Route::Post('auth/logout','Auth\LoginController@postLogout');

	// // //Register Route

	// Route::get('auth/register','Auth\RegisterController@getRegister');
	// Route::post('auth/register','Auth\RegisterController@postRegister');

		Route::get('/', function () {
		    return view('welcome');
		});


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::Resource('posts','PostController');
Route::get('/blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::get('blog',['as'=>'blog.index','uses'=>'BlogController@getIndex']);
Route::get('/','PageController@getIndex');
Route::get('about','PageController@getAbout');
Route::get('contact','PageController@getContact');
//category resource
Route::resource('categories','CategoryController',['except'=>['create']]);
Route::resource('tags','TagController',['except'=>['create']]);
//comments
Route::post('comments/{post_id}',['uses'=>'CommentsController@store','as'=>'comments.store']);
Route::get('comments/{id}/edit',['uses'=>'CommentsController@edit','as'=>'comments.edit']);
Route::put('comments/{id}',['uses'=>'CommentsController@update','as'=>'comments.update']);
Route::delete('comments/{id}',['uses'=>'CommentsController@destroy','as'=>'comments.destroy']);
Route::get('comments/{id}/delete',['uses'=>'CommentsController@delete','as'=>'comments.delete']);










