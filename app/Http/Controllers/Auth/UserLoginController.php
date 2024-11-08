<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends RoutingController
{
    public function login()
    {
        return view('auth.admin_login');
    }

    public function auth(Request $request)
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

        return back()->withErrors(['login_error' => 'Username atau Password Salah.']) ->onlyInput('username');
    }
}
