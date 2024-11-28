<?php

namespace App\Http\Controllers\Backend;

use App\Models\love_story;
use App\Models\weddings;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Love_storyController
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weddings = weddings::all();
        return view('backend.admin.tambah_love_story',compact('weddings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_wedding' => 'required',
            'photo_url' => 'required',
            'date_story' => 'required',
            'tittle_story' => 'required',
            'description_story' => 'required',
        ]);

        love_story::create([
            'id_wedding'=> $request->id_wedding,
            'photo_url' => $request->photo_url,
            'date_story' => $request->date_story,
            'tittle_story' => $request->tittle_story,
            'description_story' => $request->description_story,
        ]);

        return redirect()->route('admin.love_story')->with('success','Data love_story Berhasil di Tambah');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $weddings = weddings::all();
        $love_story = love_story::find($id);
        if(!$love_story){
            return back();
        }
        return view('backend.admin.edit_love_story', compact('love_story','weddings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $love_story = love_story::find($id);
        $request->validate([
            'id_wedding' => 'required',
            'photo_url' => 'required',
            'date_story' => 'required',
            'tittle_story' => 'required',
            'description_story' => 'required',
        ]);


        $love_story->update([
            'id_wedding'=> $request->id_wedding,
            'photo_url' => $request->photo_url,
            'date_story' => $request->date_story,
            'tittle_story' => $request->tittle_story,
            'description_story' => $request->description_story,
        ]);

        return redirect()->route('admin.detail', $id)->with('success', 'Data love_story Berhasil di Edit');
    }


    public function delete($id)
    {
        $love_story = love_story::find($id);


         $love_story->delete();

        return redirect()->back()->with('success', 'Data love_story Berhasil diHapus');


    }

    public function love_storyUser()
    {
        $love_storys = love_story::all();
        return view('backend.user.love_story', compact('love_storys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUser()
    {
    $weddings = weddings::all();
    return view('backend.user.tambah_love_story', compact('weddings'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function storeUser(Request $request)
    {
        $request->validate([
            'id_wedding' => 'required',
            'photo_url' => 'required',
            'date_story' => 'required',
            'tittle_story' => 'required',
            'description_story' => 'required',
        ]);

        $photo_url = null;

        if ($request->hasFile('photo_url')){
            $uniqueField = uniqid() . '_' . $request->file('photo_url')->getClientOriginalName();

            $request->file('photo_url')->storeAs('photo_love_story', $uniqueField, 'public');

            $photo_url = 'photo_love_story/' . $uniqueField;
        }

        love_story::create([
            'id_wedding'=> $request->id_wedding,
            'photo_url' => $photo_url,
            'date_story' => $request->date_story,
            'tittle_story' => $request->tittle_story,
            'description_story' => $request->description_story,
        ]);

        return redirect()->route('user.love_story')->with('success','Data Love Story Berhasil di Tambah');
    }

    public function editUser(string $id)
    {
        $weddings = weddings::all();
        $love_story = love_story::find($id);
        if(!$love_story){
            return back();
        }
        return view('backend.user.edit_love_story', compact('love_story','weddings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, string $id)
    {
    // Ambil data love story berdasarkan ID
    $love_story = love_story::findOrFail($id);

    // Validasi input
    $request->validate([
        'id_wedding' => 'required',
        'photo_url' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        'date_story' => 'required|date',
        'tittle_story' => 'required|string|max:255',
        'description_story' => 'required|string',
    ]);

    // Simpan foto lama
    $foto = $love_story->photo_url;

    // Jika ada file baru diunggah
    if ($request->hasFile('photo_url')) {
        // Hapus foto lama jika ada
        if ($foto && Storage::disk('public')->exists($foto)) {
            Storage::disk('public')->delete($foto);
        }

        // Simpan foto baru
        $uniqueFileName = uniqid() . '_' . $request->file('photo_url')->getClientOriginalName();
        $request->file('photo_url')->storeAs('foto_love_story', $uniqueFileName, 'public');

        // Update path foto
        $foto = 'foto_love_story/' . $uniqueFileName;
    }

    $love_story->update([
        'id_wedding' => $request->id_wedding,
        'photo_url' => $foto,
        'date_story' => $request->date_story,
        'tittle_story' => $request->tittle_story,
        'description_story' => $request->description_story,
    ]);

    return redirect()->route('user.love_story')->with('success', 'Data Love Story berhasil diedit!');
    }

    public function deleteUser($id)
    {
        $photo = love_story::find($id);


         $photo->delete();

        return redirect()->back()->with('success', 'Data photo Berhasil diHapus');

    }

}
