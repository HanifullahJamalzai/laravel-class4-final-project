<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\auth\LoginController;

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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
    
});
Route::get('/login', [LoginController::class, 'index'])->name('login');

// Route::get('/admin', [DashboardController::class, 'index'])->name('admin')->middleware('auth');

Route::get('/', [App\Http\Controllers\landing\LandingController::class, 'index'])->name('landing');
