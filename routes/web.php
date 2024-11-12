<?php

use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\WeddingController;
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
    Route::get('/admin/dashboard', [SettingController::class, 'dashboardAdmin'])->name('admin.dashboard');
    Route::get('/admin/profile', [SettingController::class, 'profiledAdmin'])->name('admin.profile');
    Route::get('/admin/logout', [SettingController::class, 'logoutAdmin'])->name('admin.logout');

    Route::get('/admin/weddings', [WeddingController::class, 'weddings'])->name('admin.weddings');
    Route::get('/admin/weddings/tambah', [WeddingController::class, 'create'])->name('admin.weddings_tambah');
    Route::post('/admin/weddings/tambah', [WeddingController::class, 'store'])->name('admin.weddings_store');
    Route::get('/admin/weddings/edit/{id}', [WeddingController::class, 'edit'])->name('admin.weddings_edit');
    Route::put('/admin/weddings/update/{id}', [WeddingController::class, 'update'])->name('admin.weddings_update');
    Route::get('/admin/weddings/delete/{id}', [WeddingController::class, 'delete'])->name('admin.weddings_delete');
});
Route::middleware(['role:user'])->group(function() {
    Route::get('/user/dashboard', [SettingController::class, 'dashboardUser'])->name('user.dashboard');
});