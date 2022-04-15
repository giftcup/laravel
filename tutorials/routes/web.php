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

// Contact us route
Route::get('contact-us', [PageController::class, 'showContactPage'])->name('contact');
Route::get('about', [PageController::class, 'showAboutPage'])->name('about');
Route::get('profile/me', [PageController::class, 'showProfileMePage'])->name('profile');

// Student routes
Route::get('students', [StudentController::class, 'index'])->name('students');
Route::get('/students/new', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('students/{id}', [StudentController::class, 'show'])->name('studentDetails');