<?php

use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\GuestController;
use App\Http\Controllers\Backend\Love_storyController;
use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\backend\RspvController;
use App\Http\Controllers\backend\RsvpController;
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

    Route::get('/admin/rsvp', [RsvpController::class, 'rsvp'])->name('admin.rsvp');
    Route::get('/admin/rsvp/tambah', [RsvpController::class, 'create'])->name('admin.rsvp_tambah');
    Route::post('/admin/rsvp/tambah', [RsvpController::class, 'store'])->name('admin.rsvp_store');
    Route::get('/admin/rsvp/edit/{id}', [RsvpController::class, 'edit'])->name('admin.edit_rsvp');
    Route::put('/admin/rsvp/update/{id}', [RsvpController::class, 'update'])->name('admin.rsvp_update');
    Route::get('/admin/rsvp/delete/{id}', [RsvpController::class, 'delete'])->name('admin.delete_rsvp'); 

    Route::get('/admin/love_story', [Love_storyController::class, 'love_story'])->name('admin.love_story');
    Route::get('/admin/love_story/tambah', [Love_storyController::class, 'create'])->name('admin.love_story_tambah');
    Route::post('/admin/love_story/tambah', [Love_storyController::class, 'store'])->name('admin.love_story_store');
    Route::get('/admin/love_story/edit/{id}', [Love_storyController::class, 'edit'])->name('admin.edit_love_story');
    Route::put('/admin/love_story/update/{id}', [Love_storyController::class, 'update'])->name('admin.love_story_update');
    Route::get('/admin/love_story/delete/{id}', [Love_storyController::class, 'delete'])->name('admin.delete_love_story');

    Route::get('/admin/comment', [CommentController::class, 'comment'])->name('admin.comment');
    Route::get('/admin/comment/tambah', [CommentController::class, 'create'])->name('admin.comment_tambah');
    Route::post('/admin/comment/tambah', [CommentController::class, 'store'])->name('admin.comment_store');
    Route::get('/admin/comment/edit/{id}', [CommentController::class, 'edit'])->name('admin.edit_comment');
    Route::put('/admin/comment/update/{id}', [CommentController::class, 'update'])->name('admin.comment_update');
    Route::get('/admin/comment/delete/{id}', [CommentController::class, 'delete'])->name('admin.delete_comment');

    Route::get('/admin/setting', [SettingController::class, 'setting'])->name('admin.setting');
    Route::get('/admin/setting/tambah', [SettingController::class, 'create'])->name('admin.setting_tambah');
    Route::post('/admin/setting/tambah', [SettingController::class, 'store'])->name('admin.setting_store');
    Route::get('/admin/setting/edit/{id}', [SettingController::class, 'edit'])->name('admin.edit_setting');
    Route::put('/admin/setting/update/{id}', [SettingController::class, 'update'])->name('admin.setting_update');
    Route::get('/admin/setting/delete/{id}', [SettingController::class, 'delete'])->name('admin.delete_setting');


    
});
Route::middleware(['role:user'])->group(function() {
    Route::get('/user/dashboard', [SettingController::class, 'dashboardUser'])->name('user.dashboard');
});
