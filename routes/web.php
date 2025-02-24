<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

// STUDENTS ROUTES
Route::get('/', [StudentsController::class, 'index'])->name('std.index');
Route::post('/create-student', [StudentsController::class, 'newStudent'])->name('std.create');