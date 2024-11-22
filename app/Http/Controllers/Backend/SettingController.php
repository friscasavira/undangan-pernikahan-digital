<?php

namespace App\Http\Controllers\Backend;

use App\Models\comments;
use App\Models\rsvp;
use App\Models\User;
use App\Models\weddings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController
{
    public function dashboardAdmin()
    {
        $weddings = weddings::all();
        $comments = comments::all();
        return view('backend.admin.dashboard',compact('weddings','comments'));
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
