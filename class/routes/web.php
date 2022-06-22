<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Mail\StudentAuthentication;
use Illuminate\Support\Facades\Mail;

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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('students', [StudentController::class, 'index'])->name('students');

Route::get('students/new', [StudentController::class, 'add'])->name('student.add');

Route::post('/students', [StudentController::class, 'store'])->name('student.store');

Route::get('/students/{id}', [StudentController::class, 'deleteStudent'])->name('student.delete');

Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');

Route::post('/students/{id}', [StudentController::class, 'editStudent'])->name('editStore');


// Department Routes

Route::get('/departments', [DepartmentController::class, 'getDepartments'])->name('departments');

Route::get('/departments/add', [DepartmentController::class, 'addDepart'])->name('department.add');

Route::post('/departments', [DepartmentController::class, 'storeDepart'])->name('department.store');

Route::get('/departments/edit/{id}', [DepartmentController::class, 'editDeptPage'])->name('department.edit');

Route::post('departments/{id}', [DepartmentController::class, 'editDepartment'])->name('edit.store');

Route::get('departments/{id}', [DepartmentController::class, 'deleteDepartment'])->name('department.delete');


// Email Routes

// Route::get('/confirm-account/{id}',  [StudentController::class, 'emailConfirmation'])->name('confirm-account');

Route::get('/send-mail/{id}/{email}', [StudentController::class, 'emailConfirmation'])->name('send-email');