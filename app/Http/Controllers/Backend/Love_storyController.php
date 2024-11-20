<?php

namespace App\Http\Controllers\Backend;

use App\Models\love_story;
use App\Models\weddings;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Love_storyController
{
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
        return view('backend.user.tambah_love_story',compact('weddings'));
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

            $request->file('photo_url')->storeAs('photo_pernikahan', $uniqueField, 'public');

            $photo_url = 'photo_pernikahan/' . $uniqueField;
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
        $photo_url = love_story::find($id);
        if(!$photo_url){
            return back();
        }
        return view('backend.user.edit_photo', compact('photo_url','weddings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, string $id)
    {
        $photo_url = love_story::find($id);
        $request->validate([
            'id_wedding' => 'required',
            'photo_url' => 'required',
            'date_story' => 'required',
            'tittle_story' => 'required',
            'description_story' => 'required',
        ]);

        $foto = $photo_url->foto;
        if($request->hasFile('photo_url')){
            if ($foto){
                Storage::disk('public')->delete($foto);
            }
            $uniqueField = uniqid() . '_' . $request->file('photo_url')->getClientOriginalName();

            $request->file('photo_url')->storeAs('foto_pernikahan',  $uniqueField, 'public');

            $foto = 'foto_pernikahan/' . $uniqueField;
        }


        $photo_url->update([
            'id_wedding'=> $request->id_wedding,
            'photo_url' => $photo_url,
            'date_story' => $request->date_story,
            'tittle_story' => $request->tittle_story,
            'description_story' => $request->description_story,
        ]);

        return redirect()->route('user.photo')->with('success', 'Data photo Berhasil di Edit');
    }


    public function deleteUser($id)
    {
        $photo = love_story::find($id);


         $photo->delete();

        return redirect()->back()->with('success', 'Data photo Berhasil diHapus');

    }

}
