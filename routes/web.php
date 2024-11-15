<?php

use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\WeddingController;
use App\Http\Controllers\Frontend\WeddingController as FrontendWeddingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendWeddingController::class, 'home'])->name('home');


Route::middleware(['guest:admin', 'guest:user'])->group(function(){
    Route::get('/admin/login', [UserLoginController::class, 'login'])->name('admin.login');
    Route::post('/admin/submit', [UserLoginController::class, 'submit'])->name('admin.submit');

    Route::get('/user/login', [UserLoginController::class, 'loginUser'])->name('user.login');
    Route::post('/user/submit', [UserLoginController::class, 'submitUser'])->name('user.submit');

});

Route::middleware(['role:admin'])->group(function() {
    Route::get('/admin/dashboard', [SettingController::class, 'dashboardAdmin'])->name('admin.dashboard');
    Route::get('/admin/profile', [SettingController::class, 'profiledAdmin'])->name('admin.profile');
    Route::get('/admin/logout', [SettingController::class, 'logoutAdmin'])->name('admin.logout');

    Route::get('/admin/weddings', [weddingController::class, 'weddings'])->name('admin.weddings');
    Route::get('/admin/weddings/tambah', [WeddingController::class, 'create'])->name('admin.weddings_tambah');
    Route::post('/admin/weddings/tambah', [WeddingController::class, 'store'])->name('admin.weddings_store');
    Route::get('/admin/weddings/edit/{id}', [WeddingController::class, 'edit'])->name('admin.edit_weddings');
    Route::put('/admin/weddings/update/{id}', [WeddingController::class, 'update'])->name('admin.weddings_update');
    Route::get('/admin/weddings/delete/{id}', [WeddingController::class, 'delete'])->name('admin.delete_weddings');

    Route::get('/admin/events', [EventController::class, 'events'])->name('admin.events');
    Route::get('/admin/events/tambah', [EventController::class, 'create'])->name('admin.events_tambah');
    Route::post('/admin/events/tambah', [EventController::class, 'store'])->name('admin.events_store');
    Route::get('/admin/events/edit/{id}', [EventController::class, 'edit'])->name('admin.edit_events');
    Route::put('/admin/events/update/{id}', [EventController::class, 'update'])->name('admin.events_update');
    Route::get('/admin/events/delete/{id}', [EventController::class, 'delete'])->name('admin.delete_events');



});
Route::middleware(['role:user'])->group(function() {
    Route::get('/user/dashboard', [SettingController::class, 'dashboardUser'])->name('user.dashboard');
    Route::get('/user/profile', [SettingController::class, 'profileUser'])->name('user.profile');
    route::put('/user/profile/update', [SettingController::class, 'updateProfile'])->name('user.profile.update');
    Route::get('/user/logout', [SettingController::class, 'logoutUser'])->name('user.logout');

    Route::get('/user/weddings', [weddingController::class, 'weddingsUser'])->name('user.weddings');
    Route::get('/user/weddings/tambah', [weddingController::class, 'createUser'])->name('user.weddings_tambah');
    Route::post('/user/weddings/tambah', [weddingController::class, 'storeUser'])->name('user.weddings_store');
    Route::get('/user/weddings/edit/{id}', [weddingController::class, 'editUser'])->name('user.edit_weddings');
    Route::put('/user/weddings/update/{id}', [weddingController::class, 'updateUser'])->name('user.weddings_update');
    Route::get('/user/weddings/delete/{id}', [weddingController::class, 'deleteUser'])->name('user.delete_weddings');

    Route::get('/user/events', [EventController::class, 'eventsUser'])->name('user.events');
    Route::get('/user/events/tambah', [EventController::class, 'createUser'])->name('user.events_tambah');
    Route::post('/user/events/tambah', [EventController::class, 'storeUser'])->name('user.events_store');
    Route::get('/user/events/edit/{id}', [EventController::class, 'editUser'])->name('user.edit_events');
    Route::put('/user/events/update/{id}', [EventController::class, 'updateUser'])->name('user.events_update');
    Route::get('/user/events/delete/{id}', [EventController::class, 'deleteUser'])->name('user.delete_events');
});
