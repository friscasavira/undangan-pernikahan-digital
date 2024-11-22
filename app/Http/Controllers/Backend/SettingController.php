<?php

namespace App\Http\Controllers\Backend;

<<<<<<< HEAD
use App\Models\comments;
use App\Models\rsvp;
=======
use App\Models\settings;
>>>>>>> 1db6e1ccb6bbaaf28f19b62b7238803221838536
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

    public function settingUser()
    {
        $settings = settings::all();
        return view('backend.user.setting', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUser()
    {
        $weddings = weddings::all();
        return view('backend.user.setting_tambah',compact('weddings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeUser(Request $request)
{
    $request->validate([
        'id_wedding' => 'required',
        'cover_photo' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        'background_music' => 'nullable|file|max:10240',
    ]);

    // Proses upload cover photo
    $cover_photo = null;
    if ($request->hasFile('cover_photo')) {
        $uniqueCoverName = uniqid() . '_' . $request->file('cover_photo')->getClientOriginalName();
        $request->file('cover_photo')->storeAs('photo_setting', $uniqueCoverName, 'public');
        $cover_photo = 'photo_setting/' . $uniqueCoverName;
    }

    // Proses upload background music
    $background_music = null;
    if ($request->hasFile('background_music')) {
        $uniqueMusicName = uniqid() . '_' . $request->file('background_music')->getClientOriginalName();
        $request->file('background_music')->storeAs('music_setting', $uniqueMusicName, 'public');
        $background_music = 'music_setting/' . $uniqueMusicName;
    }

    // Simpan data ke database
    settings::create([
        'id_wedding' => $request->id_wedding,
        'cover_photo' => $cover_photo,
        'background_music' => $background_music,
    ]);

    return redirect()->route('user.setting')->with('success', 'Data setting berhasil ditambah');
}


    public function editUser(string $id)
    {
        $weddings = weddings::all();
        $setting = settings::find($id);
        if(!$setting){
            return back();
        }
        return view('backend.user.edit_setting', compact('setting','weddings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, string $id)
{
    $setting = settings::find($id);

    $request->validate([
        'id_wedding' => 'required',
        'cover_photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        'background_music' => 'nullable|file|max:10240',
    ]);

    $cover_photo = $setting->cover_photo;
    // Update cover photo jika ada
    if ($request->hasFile('cover_photo')) {
        $uniqueCoverName = uniqid() . '_' . $request->file('cover_photo')->getClientOriginalName();
        $request->file('cover_photo')->storeAs('photo_setting', $uniqueCoverName, 'public');
        $cover_photo = 'photo_setting/' . $uniqueCoverName;
    }

    $background_music = $setting->background_music;
    // Update background music jika ada
    if ($request->hasFile('background_music')) {
        $uniqueMusicName = uniqid() . '_' . $request->file('background_music')->getClientOriginalName();
        $request->file('background_music')->storeAs('music_setting', $uniqueMusicName, 'public');
        $background_music = 'music_setting/' . $uniqueMusicName;
    }

    // Update data lainnya
    $setting->update([
        'id_wedding' => $request->id_wedding,
        'cover_photo' => $cover_photo,
        'background_music' => $background_music,
    ]);

    return redirect()->route('user.setting')->with('success', 'Data setting berhasil di edit');
}



    public function delete($id)
    {
        $setting = settings::find($id);


         $setting->delete();

        return redirect()->back()->with('success', 'Data setting Berhasil diHapus');


    }

}
