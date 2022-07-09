<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

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

// Student Routes

Route::get('/', [PageController::class, 'home'])->name('home');

Route::controller(StudentController::class)->name('student.')->group(function() {
    Route::get('students/new', 'add')->name('add');
    Route::post('students', 'store')->name('store');
    Route::get('students/{id}', 'deleteStudent')->name('delete');
    Route::get('student/{id}/edit', 'edit')->name('edit');
    Route::post('/students/{id}', 'editStudent')->name('edited');
    Route::get('student/{id}/register-courses', 'registerCourses')->name('register');
    Route::post('/students/{id}', 'saveCourses')->name('courses');
    Route::get('/student/{id}', 'studentInfo')->name('info');
    Route::get('/signup', 'signupPage')->name('signup-page');
    Route::post('/signup/{matricule}', 'signup')->name('signup');
});

Route::get('/students', [StudentController::class, 'index'])->name('students');


// Department Routes
Route::controller(DepartmentController::class)->name('department.')->group(function() {
    Route::get('departments/add', 'addDepart')->name('add');
    Route::post('/departments', 'storeDepart')->name('store');
    Route::get('/departments/edit/{id}', 'editDeptPage')->name('edit');
    Route::post('departments/{id}', 'editDepartment')->name('edited');
    Route::get('departments/{id}', 'deleteDepartment')->name('delete');
});

Route::get('/departments', [DepartmentController::class, 'getDepartments'])->name('departments');

// Course Routes
Route::controller(CourseController::class)->name('course.')->group(function() {
    Route::get('/course/add', 'addCourse')->name('add');
    Route::get('/course', 'storeCourse')->name('store');
});

Route::get('/course', [CourseController::class, 'showCourses'])->name('courses');
