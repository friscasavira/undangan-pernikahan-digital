<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController
{
    public function dashboardAdmin()
    {
        return view('backend.admin.layout.app');
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
