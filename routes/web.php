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

Route::middleware('admin')->group(function () {
    Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {

        Route::get('/dashboard','AdminController@index')->name('admin.dashboard');

        Route::group(['prefix' => 'teacher','namespace' => 'Teacher'], function () {
            Route::get('/teacher','TeacherController@index')->name('admin.teachers');
            Route::get('/create','TeacherController@create')->name('admin.teachers.create');
            Route::post('/store','TeacherController@store')->name('admin.teacher.store');
            Route::post('/filter','TeacherController@filter')->name('admin.teachers.filter');

            Route::get('/delete/{id}','TeacherController@delete')->name('admin.teachers.delete');
            Route::get('/view/{id}','TeacherController@teacher')->name('admin.teachers.view');
            Route::get('/update/{id}','TeacherController@update')->name('admin.teachers.update');
            Route::post('/edit/{id}','TeacherController@edit')->name('admin.teachers.edit');
            Route::get('/download','TeacherController@download')->name('admin.teachers.download');
        });
        Route::group(['prefix' => 'skills','namespace' => 'Skills'], function () {
            Route::get('/teacher','SkillsController@index')->name('admin.skills');
        });
    });
});


Route::middleware('teacher')->group(function () {
    Route::group(['prefix' => 'teacher','namespace' => 'Teacher'], function () {

        Route::get('/dashboard','TeacherController@index')->name('teacher.dashboard');

        Route::group(['prefix' => 'student','namespace' => 'Student'], function () {
            Route::get('/student','StudentController@index')->name('teacher.student');
            Route::get('/create','StudentController@create')->name('teacher.student.create');
            Route::post('/store','StudentController@store')->name('teacher.student.store');
        });
    });
});

Route::middleware('student')->group(function () {
    Route::group(['prefix' => 'student','namespace' => 'Student'], function () {

        Route::get('/dashboard','StudentController@index')->name('student.dashboard');

    });
});