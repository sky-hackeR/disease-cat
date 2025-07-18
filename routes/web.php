<?php

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

Route::get('/', [App\Http\Controllers\PageController::class, 'welcome'])->name('welcome');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
  Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
  Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
  Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

  // Route::get('/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
  // Route::post('/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'register']);

  Route::post('/password/email', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.request');
  Route::post('/password/reset', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'reset'])->name('password.email');
  Route::get('/password/reset', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.reset');
  Route::get('/password/reset/{token}', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'showResetForm']);

  Route::post('/updateSiteInfo', [App\Http\Controllers\Admin\AdminController::class, 'updateSiteInfo'])->name('updateSiteInfo')->middleware(['auth:admin']);

  Route::get('/home', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('home')->middleware(['auth:admin']);
  Route::get('/siteSettings', [App\Http\Controllers\Admin\AdminController::class, 'siteSettings'])->name('siteSettings')->middleware(['auth:admin']);

  Route::get('/swipers', [App\Http\Controllers\Admin\AdminController::class, 'swipers'])->name('swipers')->middleware(['auth:admin']);
  Route::post('/addSwiper', [App\Http\Controllers\Admin\AdminController::class, 'addSwiper'])->name('addSwiper')->middleware(['auth:admin']);
  Route::post('/editSwiper', [App\Http\Controllers\Admin\AdminController::class, 'editSwiper'])->name('editSwiper')->middleware(['auth:admin']);
  Route::post('/deleteSwiper', [App\Http\Controllers\Admin\AdminController::class, 'deleteSwiper'])->name('deleteSwiper')->middleware(['auth:admin']);
});
