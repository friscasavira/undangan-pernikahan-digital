<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends RoutingController
{
    public function login()
    {
        return view('auth.admin_login');
    }

    public function submit(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($request->route()->named('user.submit') && $user->role !== 'user') {
                Auth::logout();
                return redirect()->route('user.login')->withErrors(['login_error' => 'Halaman tidak sesuai untuk role Anda.']);
            } elseif ($request->route()->named('admin.submit') && $user->role !== 'admin') {
                Auth::logout();
                return redirect()->route('admin.login')->withErrors(['login_error' => 'Halaman tidak sesuai untuk role Anda.']);
            }

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'user') {
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors(['login_error' => 'Username atau Password Salah.'])->onlyInput('username');
    }

    public function loginUser()
    {
        return view('auth.user_login');
    }

    public function submitUser(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }elseif ($user->role === 'user'){
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors(['login_error' => 'username atau Password Salah.']) ->onlyInput('username');
    }

    public function registerUser()
    {
        return view('auth.user_register');
    }


    public function userSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|unique:users,username|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user',
        ]);

        return redirect()->route('user.login')->with('success', 'Register berhasil');
    }
}
