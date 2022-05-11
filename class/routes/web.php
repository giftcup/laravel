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

Route::get('/', function () {
    return view('welcome');
});

Route::get('students', [StudentController::class, 'index'])->name('students');
Route::get('students/new', [StudentController::class, 'add'])->name('student.add');
Route::post('/students', [StudentController::class, 'store'])->name('student.store');
Route::get('/students/{id}', [StudentController::class, 'deleteStudent'])->name('student.delete');
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/students/{id}', [StudentController::class, 'editStudent'])->name('editStore');
