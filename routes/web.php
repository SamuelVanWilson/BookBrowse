<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'index'] )->name('index');
Route::get('preview/{data:judul}', [UserController::class, 'show'])->name('preview');

Route::middleware(['isTamu'])->controller(AuthController::class)->name('auth.')->group(function (){
    Route::get('/auth/login', 'index')->name('login');
    Route::post('/auth/login-proses', 'login_proses')->name('login-proses');
    Route::get('/auth/register', 'register')->name('register');
    Route::post('/auth/register-proses', 'register_proses')->name('register-proses');
});

Route::resource('admin', AdminController::class)->middleware('auth');
Route::post('/auth/logout-proses', [AuthController::class, 'logout_proses'])->name('logout-proses');
