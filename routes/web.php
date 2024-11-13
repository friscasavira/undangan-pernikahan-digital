<?php

use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Frontend\WeddingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WeddingController::class, 'home'])->name('home');

Route::middleware(['guest:admin', 'guest:user'])->group(function(){
    Route::get('/admin/login', [UserLoginController::class, 'login'])->name('admin.login');
    Route::post('/admin/submit', [UserLoginController::class, 'submit'])->name('admin.submit');

    Route::get('/user/login', [UserLoginController::class, 'login'])->name('user.login');
    Route::post('/user/submit', [UserLoginController::class, 'submit'])->name('user.submit');

});

Route::middleware(['role:admin'])->group(function() {
    Route::get('/admin/dashboard', [SettingController::class, 'dashboardAdmin'])->name('admin.dashboard');
    Route::get('/admin/profile', [SettingController::class, 'profiledAdmin'])->name('admin.profile');
    Route::get('/admin/logout', [SettingController::class, 'logoutAdmin'])->name('admin.logout');
});
Route::middleware(['role:user'])->group(function() {
    Route::get('/user/dashboard', [SettingController::class, 'dashboardUser'])->name('user.dashboard');
});
