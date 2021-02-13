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

Route::get('/', 'Frontend\WelcomeController@index')->name('homePage');
Route::get('/about-us', 'Frontend\WelcomeController@aboutUs')->name('about-us');
Route::get('/contact-us', 'Frontend\WelcomeController@contactUs')->name('contact-us');
Route::post('/contact/save', 'Frontend\WelcomeController@store')->name('contact-save');


Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');


Route::group(['middleware'=>'auth'],function(){

Route::prefix('users')->group(function(){
	Route::get('/add', 'Admin\UserController@addUsers')->name('users-add');
	Route::post('/save', 'Admin\UserController@store')->name('users-save');
	Route::get('/view', 'Admin\UserController@viewUsers')->name('users-view');

	Route::get('/inactive/{id}', 'Admin\UserController@inactiveUser')->name('inactive-users');
	Route::get('/active/{id}', 'Admin\UserController@activeUser')->name('active-users');

	Route::get('/edit/{id}', 'Admin\UserController@edit')->name('users-edit');
	Route::post('/update/{id}', 'Admin\UserController@update')->name('users-update');
	Route::get('/delete/{id}', 'Admin\UserController@delete')->name('users-delete');

	Route::get('/admin-details', 'Admin\UserController@adminDetails')->name('admins-details');
	Route::get('/teacher-details', 'Admin\UserController@teacherDetails')->name('teachers-details');
});

Route::prefix('profiles')->group(function(){
	Route::get('/view', 'Admin\ProfileController@view')->name('profiles-view');
	Route::get('/edit/', 'Admin\ProfileController@edit')->name('profiles-edit');
	Route::post('/update/', 'Admin\ProfileController@update')->name('profiles-update');
	Route::get('/password/view', 'Admin\ProfileController@passwordView')->name('profiles-password-view');
	Route::post('/password/update', 'Admin\ProfileController@passwordUpdate')->name('profiles-password-update');
});

Route::prefix('departments')->group(function(){
	Route::get('/add', 'Admin\DepartmentController@add')->name('departments-add');
	Route::post('/save', 'Admin\DepartmentController@store')->name('departments-save');
	Route::get('/view', 'Admin\DepartmentController@view')->name('departments-view');
	Route::get('/inactive/{id}', 'Admin\DepartmentController@inactiveDept')->name('inactive-departments');
	Route::get('/active/{id}', 'Admin\DepartmentController@activeDept')->name('active-departments');
	Route::get('/edit/{id}', 'Admin\DepartmentController@edit')->name('departments-edit');
	Route::post('/update/{id}', 'Admin\DepartmentController@update')->name('departments-update');
	Route::get('/delete/{id}', 'Admin\DepartmentController@delete')->name('departments-delete');
});


Route::prefix('semesters')->group(function(){
	Route::get('/add', 'Admin\SemesterController@add')->name('semesters-add');
	Route::post('/save', 'Admin\SemesterController@store')->name('semesters-save');
	Route::get('/view', 'Admin\SemesterController@view')->name('semesters-view');
	Route::get('/edit/{id}', 'Admin\SemesterController@edit')->name('semesters-edit');
	Route::post('/update/{id}', 'Admin\SemesterController@update')->name('semesters-update');
	Route::get('/delete/{id}', 'Admin\SemesterController@delete')->name('semesters-delete');
});

Route::prefix('sections')->group(function(){
	Route::get('/add', 'Admin\SectionController@add')->name('sections-add');
	Route::post('/save', 'Admin\SectionController@store')->name('sections-save');
	Route::get('/view', 'Admin\SectionController@view')->name('sections-view');
	Route::get('/edit/{id}', 'Admin\SectionController@edit')->name('sections-edit');
	Route::post('/update/{id}', 'Admin\SectionController@update')->name('sections-update');
	Route::get('/delete/{id}', 'Admin\SectionController@delete')->name('sections-delete');
});


Route::prefix('days')->group(function(){
	Route::get('/add', 'Admin\DayController@add')->name('days-add');
	Route::post('/save', 'Admin\DayController@store')->name('days-save');
	Route::get('/view', 'Admin\DayController@view')->name('days-view');
	Route::get('/edit/{id}', 'Admin\DayController@edit')->name('days-edit');
	Route::post('/update/{id}', 'Admin\DayController@update')->name('days-update');
	Route::get('/delete/{id}', 'Admin\DayController@delete')->name('days-delete');
});


Route::prefix('times')->group(function(){
	Route::get('/add', 'Admin\TimeController@add')->name('times-add');
	Route::post('/save', 'Admin\TimeController@store')->name('times-save');
	Route::get('/view', 'Admin\TimeController@view')->name('times-view');
	Route::get('/edit/{id}', 'Admin\TimeController@edit')->name('times-edit');
	Route::post('/update/{id}', 'Admin\TimeController@update')->name('times-update');
	Route::get('/delete/{id}', 'Admin\TimeController@delete')->name('times-delete');
});


Route::prefix('rooms')->group(function(){
	Route::get('/add', 'Admin\RoomController@add')->name('rooms-add');
	Route::post('/save', 'Admin\RoomController@store')->name('rooms-save');
	Route::get('/view', 'Admin\RoomController@view')->name('rooms-view');
	Route::get('/inactive/{id}', 'Admin\RoomController@inactiveRoom')->name('inactive-rooms');
	Route::get('/active/{id}', 'Admin\RoomController@activeRoom')->name('active-rooms');
	Route::get('/edit/{id}', 'Admin\RoomController@edit')->name('rooms-edit');
	Route::post('/update/{id}', 'Admin\RoomController@update')->name('rooms-update');
	Route::get('/delete/{id}', 'Admin\RoomController@delete')->name('rooms-delete');

});


Route::prefix('teachers')->group(function(){
	Route::get('/make-routine', 'Admin\TeacherController@teacherMakeRoutine')->name('teachers-makeRoutine');
	Route::get('/edit-routine/{id}', 'Admin\TeacherController@editRoutine')->name('teachers-editRoutine');
	Route::post('/update-day1-routine/{id}', 'Admin\TeacherController@updateDay1Routine')->name('teachers-day1Routine');
	Route::post('/day2-routine/{id}', 'Admin\TeacherController@day2Routine')->name('teachers-day2Routine');
	Route::get('/view-routine/routine', 'Admin\TeacherController@viewRoutine')->name('teachers-viewRoutine');
});


Route::prefix('students')->group(function(){
	Route::get('/details', 'Admin\StudentController@studentDetails')->name('students-details');
	Route::get('/view-routine/routine', 'Admin\StudentController@viewRoutine')->name('students-viewRoutine');

});


Route::prefix('courses')->group(function(){
	Route::get('/add', 'Admin\CourseController@add')->name('courses-add');
	Route::post('/save', 'Admin\CourseController@store')->name('courses-save');
	Route::get('/view', 'Admin\CourseController@view')->name('courses-view');
	Route::get('/inactive/{id}', 'Admin\CourseController@inactiveCourse')->name('inactive-courses');
	Route::get('/active/{id}', 'Admin\CourseController@activeCourse')->name('active-courses');
	Route::get('/edit/{id}', 'Admin\CourseController@edit')->name('courses-edit');
	Route::post('/update/{id}', 'Admin\CourseController@update')->name('courses-update');
	Route::get('/delete/{id}', 'Admin\CourseController@delete')->name('courses-delete');
});

Route::prefix('batchs')->group(function(){
	Route::get('/add', 'Admin\BatchController@add')->name('batchs-add');
	Route::post('/save', 'Admin\BatchController@store')->name('batchs-save');
	Route::get('/view', 'Admin\BatchController@view')->name('batchs-view');
	Route::get('/inactive/{id}', 'Admin\BatchController@inactive')->name('batchs-inactive');
	Route::get('/active/{id}', 'Admin\BatchController@active')->name('batchs-active');
	Route::get('/edit/{id}', 'Admin\BatchController@edit')->name('batchs-edit');
	Route::post('/update/{id}', 'Admin\BatchController@update')->name('batchs-update');
	Route::get('/delete/{id}', 'Admin\BatchController@delete')->name('batchs-delete');
});


Route::prefix('routines')->group(function(){
	Route::get('/assign', 'Admin\RoutineController@add')->name('routines-add');
	Route::post('/save', 'Admin\RoutineController@store')->name('routines-save');
	Route::get('/view', 'Admin\RoutineController@view')->name('routines-view');
	Route::get('/edit/{id}', 'Admin\RoutineController@edit')->name('routines-edit');
	Route::post('/update/{id}', 'Admin\RoutineController@update')->name('routines-update');
	Route::get('/delete/{id}', 'Admin\RoutineController@delete')->name('routines-delete');
});


Route::prefix('logos')->group(function(){
	Route::get('/add', 'Admin\LogoController@add')->name('logos-add');
	Route::post('/save', 'Admin\LogoController@store')->name('logos-save');
	Route::get('/view', 'Admin\LogoController@view')->name('logos-view');
	Route::get('/edit/{id}', 'Admin\LogoController@edit')->name('logos-edit');
	Route::post('/update/{id}', 'Admin\LogoController@update')->name('logos-update');
	Route::get('/delete/{id}', 'Admin\LogoController@delete')->name('logos-delete');
});

Route::prefix('sliders')->group(function(){
	Route::get('/add', 'Admin\SliderController@add')->name('sliders-add');
	Route::post('/save', 'Admin\SliderController@store')->name('sliders-save');
	Route::get('/view', 'Admin\SliderController@view')->name('sliders-view');
	Route::get('/edit/{id}', 'Admin\SliderController@edit')->name('sliders-edit');
	Route::post('/update/{id}', 'Admin\SliderController@update')->name('sliders-update');
	Route::get('/delete/{id}', 'Admin\SliderController@delete')->name('sliders-delete');
});


Route::prefix('contacts')->group(function(){
	//communicate part
	Route::get('/communicate', 'Admin\ContactController@viewCommunicate')->name('contacts-communicate');
	Route::get('/communicate/delete/{id}', 'Admin\ContactController@deleteCommunicate')->name('contacts-communicate-delete');

});



});