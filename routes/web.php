<?php

use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProtfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index']);
Route::post('/email/sent', [FrontendController::class, 'emailSent'])->name('sent');

Auth::routes();
// Auth::routes(['register' => false]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::put('/updateProfile/{id}', [HomeController::class, 'updateProfile'])->name('profile.update');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/toggle-status/{id}', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');

Route::group(['prefix' => 'experience', 'middleware' => 'auth'], function () {
    Route::resource('experiences', ExperienceController::class);
});
Route::group(['prefix' => 'service', 'middleware' => 'auth'], function () {
    Route::resource('services', ServiceController::class);
});
Route::group(['prefix' => 'skill', 'middleware' => 'auth'], function () {
    Route::resource('skills', SkillController::class);
});
Route::group(['prefix' => 'protfolio', 'middleware' => 'auth'], function () {
    Route::resource('protfolios', ProtfolioController::class);

});
