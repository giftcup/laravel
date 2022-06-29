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

Route::get('/students', [StudentController::class, 'index'])->name('students');

Route::get('students/new', [StudentController::class, 'add'])->name('student.add');
Route::post('/students', [StudentController::class, 'store'])->name('student.store');
Route::post('students/{id}', [StudentController::class, 'editStudent'])->name('stud');
Route::get('students/{id}', [StudentController::class, 'deleteStudent'])->name('student.delete');
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::get('/student/{id}/register-courses', [StudentController::class, 'registerCourses'])->name('register');
Route::post('/students/{id}', [StudentController::class, 'saveCourse'])->name('save.course');
Route::get('/student/{id}', [StudentController::class, 'studentInfo'])->name('student.info');


// Department Routes

Route::get('/departments', [DepartmentController::class, 'getDepartments'])->name('departments');
Route::get('/departments/add', [DepartmentController::class, 'addDepart'])->name('department.add');
Route::post('/departments', [DepartmentController::class, 'storeDepart'])->name('department.store');
Route::get('/departments/edit/{id}', [DepartmentController::class, 'editDeptPage'])->name('department.edit');
Route::post('departments/{id}', [DepartmentController::class, 'editDepartment'])->name('edit.dept');
Route::get('departments/{id}', [DepartmentController::class, 'deleteDepartment'])->name('department.delete');


// Email Routes

// Route::get('/confirm-account/{id}',  [StudentController::class, 'emailConfirmation'])->name('confirm-account');

Route::get('/send-mail/{id}/{email}', [StudentController::class, 'emailConfirmation'])->name('send-email');


// Course Routes
Route::get('/course', [CourseController::class, 'showCourses'])->name('courses');
Route::get('/course/add', [CourseController::class, 'addCourse'])->name('add.course');
Route::post('/course/add', [CourseController::class, 'storeCourse'])->name('course.store');
