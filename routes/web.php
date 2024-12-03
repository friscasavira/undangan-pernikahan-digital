<?php

use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\Love_storyController;
use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\backend\RsvpController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\WeddingController;
use App\Http\Controllers\Frontend\WeddingController as FrontendWeddingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendWeddingController::class, 'home'])->name('home');
Route::get('/home/photo', [FrontendWeddingController::class, 'photo'])->name('home.photo');
Route::post('/home/rsvp', [FrontendWeddingController::class, 'rsvp'])->name('home.rsvp');



Route::middleware(['guest:admin', 'guest:user'])->group(function(){
    Route::get('/admin/login', [UserLoginController::class, 'login'])->name('admin.login');
    Route::post('/admin/submit', [UserLoginController::class, 'submit'])->name('admin.submit');

    Route::get('/user/login', [UserLoginController::class, 'loginUser'])->name('user.login');
    Route::post('/user/submit', [UserLoginController::class, 'submitUser'])->name('user.submit');
    Route::get('/user/register', [UserLoginController::class, 'registerUser'])->name('user.register');
    Route::post('/user/register', [UserLoginController::class, 'userSubmit'])->name('register.submit');
    

});

Route::middleware(['role:admin'])->group(function() {
    Route::get('/admin/dashboard', [SettingController::class, 'dashboardAdmin'])->name('admin.dashboard');
    Route::get('/admin/profile', [SettingController::class, 'profileAdmin'])->name('admin.profile');
    Route::put('/admin/profile/update', [SettingController::class, 'update'])->name('admin.profile_update');
    Route::get('/admin/logout', [SettingController::class, 'logoutAdmin'])->name('admin.logout');

    Route::get('/admin/weddings', [weddingController::class, 'weddings'])->name('admin.weddings');
    Route::get('/admin/weddings/detail/{id}', [weddingController::class, 'detail'])->name('admin.detail');
    Route::get('/admin/weddings/tambah', [WeddingController::class, 'create'])->name('admin.weddings_tambah');
    Route::post('/admin/weddings/tambah', [WeddingController::class, 'store'])->name('admin.weddings_store');
    Route::get('/admin/weddings/edit/{id}', [WeddingController::class, 'edit'])->name('admin.edit_weddings');
    Route::put('/admin/weddings/update/{id}', [WeddingController::class, 'update'])->name('admin.weddings_update');
    Route::get('/admin/weddings/delete/{id}', [WeddingController::class, 'delete'])->name('admin.delete_weddings');

    Route::get('/admin/events', [EventController::class, 'events'])->name('admin.events');
    Route::get('/admin/events/tambah', [EventController::class, 'create'])->name('admin.events_tambah');
    Route::post('/admin/events/tambah', [EventController::class, 'store'])->name('admin.events_store');
    Route::get('/admin/wedding/events/{id_wedding}/edit/{id}', [EventController::class, 'edit'])->name('admin.edit_events');
    Route::put('/admin/wedding/events/{id_wedding}/update/{id}', [EventController::class, 'update'])->name('admin.events_update');
    Route::get('/admin/wedding/events/{id_wedding}/delete/{id}', [EventController::class, 'delete'])->name('admin.delete_events');

    Route::get('/admin/rsvp', [RsvpController::class, 'rsvp'])->name('admin.rsvp');
    Route::get('/admin/rsvp/tambah', [RsvpController::class, 'create'])->name('admin.rsvp_tambah');
    Route::post('/admin/rsvp/tambah', [RsvpController::class, 'store'])->name('admin.rsvp_store');
    Route::get('/admin/rsvp/edit/{id}', [RsvpController::class, 'edit'])->name('admin.edit_rsvp');
    Route::get('/admin/rsvp/update/{id}', [RsvpController::class, 'update'])->name('admin.rsvp_update');
    Route::get('/admin/rsvp/delete/{id}', [RsvpController::class, 'delete'])->name('admin.delete_rsvp');

    Route::get('/admin/wedding/photo/{id}', [photoController::class, 'photo'])->name('admin.photo');
    Route::get('/admin/photo/tambah', [photoController::class, 'create'])->name('admin.photo_tambah');
    Route::post('/admin/photo/tambah', [photoController::class, 'store'])->name('admin.photo_store');
    Route::get('/admin/wedding/photo/{id_wedding}/edit/{id}', [photoController::class, 'edit'])->name('admin.edit_photo');
    Route::put('/admin/wedding/photo/{id_wedding}/update/{id}', [photoController::class, 'update'])->name('admin.photo_update');
    Route::get('/admin/photo/delete/{id}', [photoController::class, 'delete'])->name('admin.delete_photo');
    Route::get('/admin/photo/foto/{id}', [photoController::class, 'foto'])->name('admin.foto_photo');

    Route::get('/admin/love_story', [Love_storyController::class, 'love_story'])->name('admin.love_story');
    Route::get('/admin/love_story/tambah', [Love_storyController::class, 'create'])->name('admin.love_story_tambah');
    Route::post('/admin/love_story/tambah', [Love_storyController::class, 'store'])->name('admin.love_story_store');
    Route::get('/admin/wedding/love_story/{id_wedding}/edit/{id}', [Love_storyController::class, 'edit'])->name('admin.edit_love_story');
    Route::put('/admin/wedding/love_story/{id_wedding}/update/{id}', [Love_storyController::class, 'update'])->name('admin.love_story_update');
    Route::get('/admin/wedding/love_story/{id_wedding}/delete/{id}', [Love_storyController::class, 'delete'])->name('admin.delete_love_story');

    Route::get('/admin/comment', [CommentController::class, 'comment'])->name('admin.comment');
    Route::get('/admin/comment/tambah', [CommentController::class, 'create'])->name('admin.comment_tambah');
    Route::post('/admin/comment/tambah', [CommentController::class, 'store'])->name('admin.comment_store');
    Route::get('/admin/wedding/comment/{id_wedding}/edit/{id}', [CommentController::class, 'edit'])->name('admin.edit_comment');
    Route::put('/admin/wedding/comment/{id_wedding}/update/{id}', [CommentController::class, 'update'])->name('admin.comment_update');
    Route::get('/admin/wedding/comment/{id_wedding}/delete/{id}', [CommentController::class, 'delete'])->name('admin.delete_comment');

    Route::get('/admin/setting', [SettingController::class, 'setting'])->name('admin.setting');
    Route::get('/admin/setting/tambah', [SettingController::class, 'create'])->name('admin.setting_tambah');
    Route::post('/admin/setting/tambah', [SettingController::class, 'store'])->name('admin.setting_store');
    Route::get('/admin/setting/edit/{id}', [SettingController::class, 'edit'])->name('admin.edit_setting');
    Route::put('/admin/setting/update/{id}', [SettingController::class, 'update'])->name('admin.setting_update');
    Route::get('/admin/setting/delete/{id}', [SettingController::class, 'delete'])->name('admin.delete_setting');



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

    Route::get('/user/rsvp', [RsvpController::class, 'rsvpUser'])->name('user.rsvp');

    Route::get('/user/photo', [photoController::class, 'photoUser'])->name('user.photo');
    Route::get('/user/photo/tambah', [photoController::class, 'createUser'])->name('user.photo_tambah');
    Route::post('/user/photo/tambah', [photoController::class, 'storeUser'])->name('user.photo_store');
    Route::get('/user/photo/edit/{id}', [photoController::class, 'editUser'])->name('user.edit_photo');
    Route::put('/user/photo/update/{id}', [photoController::class, 'updateUser'])->name('user.photo_update');
    Route::get('/user/photo/delete/{id}', [photoController::class, 'deleteUser'])->name('user.delete_photo');

    Route::get('/user/love_story', [Love_storyController::class, 'love_storyUser'])->name('user.love_story');
    Route::get('/user/love_story/tambah', [Love_storyController::class, 'createUser'])->name('user.love_story_tambah');
    Route::post('/user/love_story/tambah', [Love_storyController::class, 'storeUser'])->name('user.love_story_store');
    Route::get('/user/love_story/edit/{id}', [Love_storyController::class, 'editUser'])->name('user.edit_love_story');
    Route::put('/user/love_story/update/{id}', [Love_storyController::class, 'updateUser'])->name('user.love_story_update');
    Route::get('/user/love_story/delete/{id}', [Love_storyController::class, 'deleteUser'])->name('user.delete_love_story');

    Route::get('/user/comment', [CommentController::class, 'commentUser'])->name('user.comment');

    Route::get('/user/setting', [SettingController::class, 'settingUser'])->name('user.setting');
    Route::get('/user/setting/tambah', [SettingController::class, 'createUser'])->name('user.setting_tambah');
    Route::post('/user/setting/tambah', [SettingController::class, 'storeUser'])->name('user.setting_store');
    Route::get('/user/setting/edit/{id}', [SettingController::class, 'editUser'])->name('user.edit_setting');
    Route::put('/user/setting/update/{id}', [SettingController::class, 'updateUser'])->name('user.setting_update');
    Route::get('/user/setting/delete/{id}', [SettingController::class, 'deleteUser'])->name('user.delete_setting');

});
