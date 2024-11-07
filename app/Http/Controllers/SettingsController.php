<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
