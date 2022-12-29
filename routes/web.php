<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.master');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('leaderboard', [\App\Http\Controllers\StatisticController::class, 'index'])->name('leaderboard');
    Route::resource('groups', GroupController::class)->middleware('admin');
    Route::resource('students', \App\Http\Controllers\StudentController::class)->middleware('admin');
    Route::resource('maqola', \App\Http\Controllers\MaqolaController::class)->middleware('student');
    Route::resource('projects', \App\Http\Controllers\ProjectController::class)->middleware('student');
    Route::resource('stipendiya', \App\Http\Controllers\StipendiyaController::class)->middleware('student');
    Route::resource('certificate', \App\Http\Controllers\CertificateController::class)->middleware('student');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
