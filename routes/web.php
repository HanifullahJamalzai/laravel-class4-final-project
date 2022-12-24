<?php

use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
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
Route::group(['prefix' => 'admin','middleware' => 'auth'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::post('category/search', [CategoryController::class, 'search'])->name('category.search');
    Route::get('category/{category}/forcedelete', [CategoryController::class, 'forceDelete'])->name('category.forcedelete');
    Route::get('category/{category}/restore', [CategoryController::class, 'restore'])->name('category.restore');
    Route::get('category/trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::resource('category', CategoryController::class);
    
    Route::post('tag/search', [TagController::class, 'search'])->name('tag.search');
    Route::get('tag/{tag}/forcedelete', [TagController::class, 'forceDelete'])->name('tag.forcedelete');
    Route::get('tag/{tag}/restore', [TagController::class, 'restore'])->name('tag.restore');
    Route::get('tag/trash', [TagController::class, 'trash'])->name('tag.trash');
    Route::resource('tag', TagController::class);

    Route::resource('post', PostController::class);

});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.form');
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


// Route::get('/admin', [DashboardController::class, 'index'])->name('admin')->middleware('auth');



Route::group(['middleware' => ['landingCommonMiddleware', 'languageSwitcher']], function () {
    Route::get('/', [App\Http\Controllers\landing\LandingController::class, 'index'])->name('landing');
    Route::get('/about', [App\Http\Controllers\landing\LandingController::class, 'about'])->name('about');
    Route::get('/contact', [App\Http\Controllers\landing\LandingController::class, 'contact'])->name('contact');
    Route::get('/posts', [App\Http\Controllers\landing\LandingController::class, 'posts'])->name('posts');
    Route::get('/post/{id}/{slug?}', [App\Http\Controllers\landing\LandingController::class, 'post'])->name('post');
    Route::get('/posts/{id}/{category?}', [App\Http\Controllers\landing\LandingController::class, 'category'])->name('category.posts');
    Route::get('/language/{language}', function ($language) {
            app()->setLocale($language);
        // return app()->getLocale();
        session(['language' => $language]);
        return back();
    })->name('language');
});


// Landing Page Related Routes