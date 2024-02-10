<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\TemplateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('main');

/* auth route */
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'store'])->name('register.store')->middleware('guest');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/* Admin route */
Route::get('/admin', [AdminController::class, 'index'])->name('admin.show');

// forget-password route
Route::get('/forget-password', [ForgetPasswordController::class, 'forgetPassword'])->name('forget.password');

Route::post('/forget-password', [ForgetPasswordController::class, 'forgetPasswordPost'])->name('forget.password.post');

Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('reset.password');

Route::post('/reset-password', [ForgetPasswordController::class, 'resetPasswordPost'])->name('reset.password.post');

/* template route */
Route::get('/template', [TemplateController::class, 'manage_template'])->name('templates.manage-template');

Route::get('/template/{template}', [TemplateController::class, 'show'])->name('templates.show');

Route::post('/template', [TemplateController::class, 'store'])->name('templates.store')->middleware('auth');

Route::get('/template/{template}/edit', [TemplateController::class, 'edit'])->name('templates.edit');

Route::put('/template/{template}', [TemplateController::class, 'update'])->name('templates.update');

Route::delete('/template/{template}', [TemplateController::class, 'destroy'])->name('templates.destroy');
