<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\SendTmeplateController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\AssignRoleToUserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SendVideoController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageController;

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

/* boilerplate route */
Route::get('/home/{boilerplate}', [MainController::class, 'boilerplate'])->name('boilerplate');

/* auth route */
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'store'])->name('register.store')->middleware('guest');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::delete('/user/delete', [AuthController::class, 'destroy'])->name('user.delete');

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

Route::post('/template/{template}/restore', [TemplateController::class, 'restore'])->name('templates.restore');

/* Send template route */
Route::post('/template/{template}/send', [SendTmeplateController::class, 'send'])->name('templates.send');

Route::get('/template/{template}/render', [MainController::class, 'renderBoilerplate'])->name('templates.renderBoilerplate');


/* subscribe controller */
Route::post('/subscribe/proccess', [SubscribeController::class, 'subscribe'])->name('subscribe');

Route::get('/subscribe/section', function() {
    $logged = true;
    return view('subscribe', compact('logged'));
})->name('subscribe.section');

/* Assign Role To user route */
Route::post('/users/{user}', [AssignRoleToUserController::class, 'assignRoleToUser'])->name('users.assignRoleToUser');

/* displaying videos */
Route::get('/vidoes/form', [VideoController::class, 'videoForm'])->name('videoForm');

/* uploading videos */
Route::post('/videos/upload', [VideoController::class, 'uploadVideo'])->name('uploadVideo');

/* send video route */
Route::post('/videos/{template}', [SendVideoController::class, 'send'])->name('videos.send');

/* render video route */
Route::get('/template/{template}/renderVideo', [MainController::class, 'renderVideoTemplate'])->name('templates.renderVideoTemplate');

/* download as pdf route */
Route::get('/download/{template}', [PdfController::class, 'download'])->name('template.download');

/* Profile Route */
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

Route::put('/profile/userInfo', [ProfileController::class, 'userInfoUpdate'])->name('profile.userInfo.update');

Route::put('/profile/password', [ProfileController::class, 'passwordUpdate'])->name('profile.password.update');

Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

/* my templates */
Route::get('/templates/mytemplates', [MainController::class, 'mytemplates'])->name('mytemplates');

Route::get('/home/{boilerplate}/edit', [MainController::class, 'boilerplateEdit'])->name('boilerplate.edit');

Route::get('/templates/deletedTemplates', [MainController::class, 'deletedTemplates'])->name('deletedTemplates');

/* images upload route */
Route::get('/images/form', [ImageController::class, 'imageForm'])->name('imageForm');

Route::get('/images/show', [ImageController::class, 'show'])->name('images.show');

Route::post('/images/uploadImage', [ImageController::class, 'store'])->name('uploadImage');
