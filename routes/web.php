<?php

use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\WeddingController;
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

    Route::get('/admin/weddings', [weddingController::class, 'weddings'])->name('admin.weddings');
    Route::get('/admin/weddings/tambah', [weddingController::class, 'create'])->name('admin.weddings_tambah');
    Route::post('/admin/weddings/tambah', [weddingController::class, 'store'])->name('admin.weddings_store');
    Route::get('/admin/weddings/edit/{id}', [weddingController::class, 'edit'])->name('admin.edit_weddings');
    Route::put('/admin/weddings/update/{id}', [weddingController::class, 'update'])->name('admin.weddings_update');
    Route::get('/admin/weddings/delete/{id}', [weddingController::class, 'delete'])->name('admin.delete_weddings');

    Route::get('/admin/events', [EventController::class, 'events'])->name('admin.events');
    Route::get('/admin/events/tambah', [EventController::class, 'create'])->name('admin.events_tambah');
    Route::post('/admin/events/tambah', [EventController::class, 'store'])->name('admin.events_store');
    Route::get('/admin/events/edit/{id}', [EventController::class, 'edit'])->name('admin.edit_events');
    Route::put('/admin/events/update/{id}', [EventController::class, 'update'])->name('admin.events_update');
    Route::get('/admin/events/delete/{id}', [EventController::class, 'delete'])->name('admin.delete_events');


    
});
Route::middleware(['role:user'])->group(function() {
    Route::get('/user/dashboard', [SettingController::class, 'dashboardUser'])->name('user.dashboard');
});
