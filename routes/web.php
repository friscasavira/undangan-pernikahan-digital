<?php

use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest:admin', 'guest:user'])->group(function(){
    Route::get('/admin/login', [UserLoginController::class, 'login'])->name('admin.login');
    Route::post('/admin/submit', [UserLoginController::class, 'submit'])->name('admin.submit');

    Route::get('/user/login', [UserLoginController::class, 'login'])->name('user.login');
    Route::post('/user/submit', [UserLoginController::class, 'submit'])->name('user.submit');

});

Route::middleware(['role:admin'])->group(function() {
    Route::get('/admin/dashboard', [SettingsController::class, 'dashboard'])->name('admin.dashboard');
});
Route::middleware(['role:user'])->group(function() {
    Route::get('/user/dashboard', [SettingsController::class, 'dashboard'])->name('user.dashboard');
});