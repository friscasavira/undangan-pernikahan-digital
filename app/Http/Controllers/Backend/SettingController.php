<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController
{
    public function dashboardAdmin()
    {
        return view('backend.admin.dashboard');
    }

    public function dashboardUser()
    {
        return view('user.dashboard');
    }

    public function profileAdmin()
    {
        
    }

    public function logoutAdmin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
