<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\Faculty\QuizController as FacultyQuizController;
use App\Http\Controllers\Student\QuizController as StudentQuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

// Faculty routes
Route::middleware(['auth', 'role:faculty'])->prefix('faculty')->name('faculty.')->group(function () {
    Route::get('/dashboard', function () {
        return view('faculty.dashboard');
    })->name('dashboard');
    Route::resource('quizzes', FacultyQuizController::class);
});

// Student routes
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', function () {
        return view('student.dashboard');
    })->name('dashboard');
    Route::resource('quizzes', StudentQuizController::class)->only(['index', 'show']);
    Route::post('/quizzes/{quiz}/submit', [StudentQuizController::class, 'submit'])->name('quizzes.submit');
});

// Leaderboard (all authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';