<?php

use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function(){
    Route::get('/admin/login', [UserLoginController::class, 'login'])->name('admin_login');
    Route::post('/admin/submit', [UserLoginController::class, 'auth'])->name('admin.submit');

});

Route::middleware(['admin'])->group(function() {
    Route::get('/admin/dashboard', [SettingsController::class, 'dashboard'])->name('admin.dashboard');
});

