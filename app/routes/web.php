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

Route::get('/', ['uses' => 'LoginController@index']);
Route::get('logout', ['uses' => 'LoginController@logout']);

Route::post('formSubmit','LoginController@formSubmit');
Route::post('formSubmitRegister','LoginController@formSubmitRegister');

Route::group(
	[
		'middleware' => 'auth',
		'prefix'=>'admin'
	],function(){
    	Route::get('/', 'Admin\DashboardController@index');
    	Route::get('subject', 'Admin\SubjectController@index');
    	Route::post('subject/post', 'Admin\SubjectController@post');
    	Route::get('create-category/{id?}', 'Admin\CreateController@index');
      Route::get('delete-category/{id}', 'Admin\SubjectController@delete');

      Route::get('question', 'Admin\QuestionController@index');
      Route::post('question/post', 'Admin\QuestionController@post');
      Route::get('create-category-question/{id?}', 'Admin\CreateController@question');
      Route::get('delete-question/{id}', 'Admin\QuestionController@delete');
      Route::get('question-final/{id}', 'Admin\QuestionController@questionFinal');
});


Route::get('test-conn',function(){
  // Test database connection
  try {
    DB::connection()->getPdo();
    if(DB::connection()->getDatabaseName()){
      return 'Successfully connected to the DB: '. DB::connection()->getDatabaseName();
    }
  } catch (\Exception $e){
    return 'Could not connect to the database. Please check your configuration.';
  }
});