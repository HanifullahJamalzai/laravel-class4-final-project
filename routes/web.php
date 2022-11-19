<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;

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

// Admin Related Routes
Route::group(['middleware' => 'auth'], function(){
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');

// Route::get('/admin', [DashboardController::class, 'index'])->name('admin')->middleware('auth');



// Landing Page Related Routes
Route::get('/', [App\Http\Controllers\landing\LandingController::class, 'index'])->name('landing');
Route::get('/about', [App\Http\Controllers\landing\LandingController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\landing\LandingController::class, 'contact'])->name('contact');
Route::get('/post', [App\Http\Controllers\landing\LandingController::class, 'post'])->name('post');
Route::get('/posts', [App\Http\Controllers\landing\LandingController::class, 'posts'])->name('posts');