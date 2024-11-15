<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController
{
    public function dashboardAdmin()
    {
        return view('backend.admin.dashboard');
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

    public function dashboardUser()
    {
        return view('backend.user.dashboard');
    }

    public function profileUser(Request $request)
    {
        {
            $profile = Auth::user();
            return view('backend.user.profile', compact('profile'));
        }
    }
    public function updateProfile(Request $request)
    {
        $id_user = Auth::user()->id_user;
        $user = User::find($id_user);

        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'nullable|min:6',
        ]);

        $user->update([
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> $request->filled('password') ? Hash::make($request->password) : $user->password,

        ]);

        return redirect()->route('user.profile')->with('success', "Data anda Berhasil di update");

    }

    public function logoutUser(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login');
    }
}
