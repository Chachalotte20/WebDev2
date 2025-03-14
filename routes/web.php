<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentsController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// AUTH
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/user-login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/register', [AuthController::class, 'indexRegister'])->name('auth.register');
Route::post('/user-register', [AuthController::class, 'userRegister'])->name('auth.userRegister');


Route::middleware([AuthCheck::class])->group(function () {
    // STUDENTS ROUTES
    Route::get('/students', [StudentsController::class, 'index'])->name('std.index');
    Route::post('/create-student', [StudentsController::class, 'newStudent'])->name('std.create');

    Route::get('/logout', [StudentsController::class, 'logout'])->name('std.logout');
});