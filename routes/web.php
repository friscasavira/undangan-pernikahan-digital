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

Route::get('/{unique_url}', [FrontendWeddingController::class, 'home'])->name('home');
Route::get('/', [FrontendWeddingController::class, 'view'])->name('view');
Route::get('/{unique_url}/photo', [FrontendWeddingController::class, 'photo'])->name('home.photo');
Route::post('/home/{unique_url}/rsvp', [FrontendWeddingController::class, 'rsvp'])->name('home.rsvp');

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
    Route::get('/admin/weddings/edit/{id}', [WeddingController::class, 'edit'])->name('admin.edit_weddings');
    Route::put('/admin/weddings/update/{id}', [WeddingController::class, 'update'])->name('admin.weddings_update');
    Route::get('/admin/weddings/delete/{id}', [WeddingController::class, 'delete'])->name('admin.delete_weddings');

    Route::get('/admin/events', [EventController::class, 'events'])->name('admin.events');
    Route::get('/admin/wedding/events/{id_wedding}/edit/{id}', [EventController::class, 'edit'])->name('admin.edit_events');
    Route::put('/admin/wedding/events/{id_wedding}/update/{id}', [EventController::class, 'update'])->name('admin.events_update');
    Route::get('/admin/wedding/events/{id_wedding}/delete/{id}', [EventController::class, 'delete'])->name('admin.delete_events');

    Route::get('/admin/rsvp/{id}', [RsvpController::class, 'rsvp'])->name('admin.rsvp');

    Route::get('/admin/wedding/photo/{id}', [photoController::class, 'photo'])->name('admin.photo');
    Route::get('/admin/wedding/photo/{id_wedding}/edit/{id}', [photoController::class, 'edit'])->name('admin.edit_photo');
    Route::put('/admin/wedding/photo/{id_wedding}/update/{id}', [photoController::class, 'update'])->name('admin.photo_update');
    Route::get('/admin/photo/delete/{id}', [photoController::class, 'delete'])->name('admin.delete_photo');
    Route::get('/admin/photo/foto/{id}', [photoController::class, 'foto'])->name('admin.foto_photo');

    Route::get('/admin/love_story', [Love_storyController::class, 'love_story'])->name('admin.love_story');
    Route::get('/admin/wedding/love_story/{id_wedding}/edit/{id}', [Love_storyController::class, 'edit'])->name('admin.edit_love_story');
    Route::put('/admin/wedding/love_story/{id_wedding}/update/{id}', [Love_storyController::class, 'update'])->name('admin.love_story_update');
    Route::get('/admin/wedding/love_story/{id_wedding}/delete/{id}', [Love_storyController::class, 'delete'])->name('admin.delete_love_story');
});

Route::middleware(['role:user'])->group(function() {
    Route::get('/user/dashboard', [SettingController::class, 'dashboardUser'])->name('user.dashboard');
    Route::get('/user/profile', [SettingController::class, 'profileUser'])->name('user.profile');
    route::put('/user/profile/update', [SettingController::class, 'updateProfile'])->name('user.profile.update');
    Route::get('/user/logout', [SettingController::class, 'logoutUser'])->name('user.logout');

    Route::get('/user/weddings', [weddingController::class, 'weddingsUser'])->name('user.weddings');
    Route::get('/user/weddings/detail/{id}', [weddingController::class, 'detailUser'])->name('user.detail');
    Route::get('/user/weddings/tambah', [weddingController::class, 'createUser'])->name('user.weddings_tambah');
    Route::post('/user/weddings/tambah', [weddingController::class, 'storeUser'])->name('user.weddings_store');
    Route::get('/user/weddings/edit/{id}', [weddingController::class, 'editUser'])->name('user.edit_weddings');
    Route::put('/user/weddings/update/{id}', [weddingController::class, 'updateUser'])->name('user.weddings_update');
    Route::get('/user/weddings/delete/{id}', [weddingController::class, 'deleteUser'])->name('user.delete_weddings');

    Route::get('/user/events', [EventController::class, 'eventsUser'])->name('user.events');
    Route::get('/user/weddings/events/tambah/{id_wedding}', [EventController::class, 'createUser'])->name('user.events_tambah');
    Route::post('/user/weddings/events/tambah/{id_wedding}', [EventController::class, 'storeUser'])->name('user.events_store');
    Route::get('/user/wedding/events/{id_wedding}/edit/{id_event}', [EventController::class, 'editUser'])->name('user.edit_events');
    Route::put('/user/weddings/events/{id_wedding}/update/{id_event}', [EventController::class, 'updateUser'])->name('user.events_update');
    Route::get('/user/weddings/events/{id_wedding}/delete/{id_event}', [EventController::class, 'deleteUser'])->name('user.delete_events');

    Route::get('/user/rsvp/{id}', [RsvpController::class, 'rsvpUser'])->name('user.rsvp');
    Route::get('/user/rsvp/{id}', [RsvpController::class, 'rsvpUser'])->name('user.rsvp');

    Route::get('/user/photo', [photoController::class, 'photoUser'])->name('user.photo');
    Route::get('/user/wedding/photo/tambah/{id_wedding}', [photoController::class, 'createUser'])->name('user.photo_tambah');
    Route::post('/user/wedding/photo/tambah/{id_wedding}', [photoController::class, 'storeUser'])->name('user.photo_store');
    Route::get('/user/wedding/photo/{id_wedding}/edit/{id_photo}', [photoController::class, 'editUser'])->name('user.edit_photo');
    Route::put('/user/wedding/photo/{id_wedding}/update/{id_photo}', [photoController::class, 'updateUser'])->name('user.photo_update');
    Route::get('/user/wedding/photo/{id_wedding}/delete/{id_photo}', [photoController::class, 'deleteUser'])->name('user.delete_photo');

    Route::get('/user/love_story', [Love_storyController::class, 'love_storyUser'])->name('user.love_story');
    Route::get('/user/wedding/love_story/tambah/{id_wedding}', [Love_storyController::class, 'createUser'])->name('user.love_story_tambah');
    Route::post('/user/wedding/love_story/tambah/{id_wedding}', [Love_storyController::class, 'storeUser'])->name('user.love_story_store');
    Route::get('/user/wedding/love_story/{id_wedding}/edit/{id_story}', [Love_storyController::class, 'editUser'])->name('user.edit_love_story');
    Route::put('/user/wedding/love_story/{id_wedding}/update/{id_story}', [Love_storyController::class, 'updateUser'])->name('user.love_story_update');
    Route::get('/user/wedding/love_story/{id_wedding}/delete/{id_story}', [Love_storyController::class, 'deleteUser'])->name('user.delete_love_story');

    Route::get('/user/setting', [SettingController::class, 'settingUser'])->name('user.setting');
    Route::get('/user/setting/tambah', [SettingController::class, 'createUser'])->name('user.setting_tambah');
    Route::post('/user/setting/tambah', [SettingController::class, 'storeUser'])->name('user.setting_store');
    Route::get('/user/setting/edit/{id}', [SettingController::class, 'editUser'])->name('user.edit_setting');
    Route::put('/user/setting/update/{id}', [SettingController::class, 'updateUser'])->name('user.setting_update');
    Route::get('/user/setting/delete/{id}', [SettingController::class, 'deleteUser'])->name('user.delete_setting');

});
