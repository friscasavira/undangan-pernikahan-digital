<?php

use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
