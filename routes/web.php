<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/tentang', [PublicController::class, 'about'])->name('about');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/experience', [PublicController::class, 'experience'])->name('experience');
Route::get('/kontak', [ContactController::class, 'create'])->name('contact.create');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store')->middleware('throttle:5,1');
Route::get('/cv/download', CvController::class)->name('cv.download');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:10,1');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
    Route::resource('projects', App\Http\Controllers\Admin\ProjectController::class)->except('show');
    Route::resource('experiences', App\Http\Controllers\Admin\ExperienceController::class)->except('show');
    Route::resource('educations', App\Http\Controllers\Admin\EducationController::class)->except('show');
    Route::resource('skills', App\Http\Controllers\Admin\SkillController::class)->except('show');
    Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/messages', [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('messages.index');
    Route::patch('/messages/{message}', [App\Http\Controllers\Admin\MessageController::class, 'update'])->name('messages.update');
    Route::delete('/messages/{message}', [App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('messages.destroy');
});
