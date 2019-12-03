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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('class','ClassesController');
Route::resource('student','StudentsController');
Route::get('/teacher','TeachersController@index');
Route::resource('section','SectionsController');
Route::get('multi', 'StudentsController@import');
 Route::post('/bulk-upload','StudentsController@bulkUpload');
 Route::get('/getStudentByClass/{cid}/{sid}','TeachersController@getStudents');
 Route::post('/saveattendence','TeachersController@saveattendence');

 Route::resource('attendence','AttendenceController');
 Route::get('attendence/show','AttendenceController@show');
	
