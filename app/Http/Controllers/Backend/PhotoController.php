<?php

namespace App\Http\Controllers\Backend;

use App\Models\photos;
use App\Models\weddings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController
{
    public function photo($id)
    {
        $photos = photos::where('id_wedding', $id)->get();
        return view('backend.admin.photo', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weddings = weddings::all();
        return view('backend.admin.photo_tambah',compact('weddings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_wedding' => 'required',
            'photo_url' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            'caption' => 'required',

        ]);

        $photo_url = null;

        if($request->hasFile('photo_url')){
            $uniqueField = uniqid() . '_' . $request->file('photo_url')->getClientOriginalName();

            $request->file('photo_url')->storeAs('photo_pernikahan', $uniqueField, 'public');

            $photo_url = 'photo_pernikahan/' . $uniqueField;
        }

        photos::create([
            'id_wedding'=> $request->id_wedding,
            'photo_url' => $photo_url,
            'caption' => $request->caption,
        ]);

        return redirect()->route('admin.photo')->with('success','Data photo Berhasil di Tambah');
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
        $photos = photos::where('id_wedding', $id)->get();
        // $photo = photos::find($id);
        if(!$photos){
            return back();
        }
        return view('backend.admin.edit_photo', compact('photos','weddings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $photos = photos::where('id_wedding', $id)->get();
        // $photo = photos::find($id);
        $request->validate([
            'id_wedding' => 'required',
            'photo_url' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'caption' => 'required',
        ]);

        $foto = $photos->foto;
        if($request->hasFile('foto')){
            if ('foto'){
                Storage::disk('public')->delete($foto);
            }
            $uniqueField = uniqid() . '_' . $request->file('foto')->getClientOriginalName();

            $request->file('foto')->storeAs('foto_pernikahan',  $uniqueField, 'public');

            $foto = 'foto_pernikahan/' . $uniqueField;
        }


        $photos->update([
            'id_wedding'=> $request->id_wedding,
            'photo_url' => $request->photo_url,
            'caption' => $request->caption,
        ]);

        return redirect()->route('admin.photo')->with('success', 'Data photo Berhasil di Edit');
    }


    public function delete($id)
    {
<<<<<<< HEAD
        $photos = photos::find($id);
        
=======
        $photo = photos::find($id);

>>>>>>> 1db6e1ccb6bbaaf28f19b62b7238803221838536

         $photos->delete();

        return redirect()->back()->with('success', 'Data photo Berhasil diHapus');

    }

<<<<<<< HEAD
    
        $photos = photos::find($id);
        $foto = $photos->foto;

        if($photos->foto) {
            if(Storage::disk('public')->exists($foto)){
               Storage::disk('public')->delete($foto);
=======
    public function photoUser()
    {
        $photos = photos::all();
        return view('backend.user.photo', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUser()
    {
        $weddings = weddings::all();
        return view('backend.user.photo_tambah',compact('weddings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeUser(Request $request)
    {
        $request->validate([
            'id_wedding' => 'required',
            'photo_url' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            'caption' => 'required',

        ]);

        $photo_url = null;

        if ($request->hasFile('photo_url')){
            $uniqueField = uniqid() . '_' . $request->file('photo_url')->getClientOriginalName();

            $request->file('photo_url')->storeAs('photo', $uniqueField, 'public');

            $photo_url = 'photo/' . $uniqueField;
        }

        photos::create([
            'id_wedding'=> $request->id_wedding,
            'photo_url' => $photo_url,
            'caption' => $request->caption,
        ]);

        return redirect()->route('user.photo')->with('success','Data Photo Berhasil di Tambah');
    }

    public function editUser(string $id)
    {
        $weddings = weddings::all();
        $photo = photos::find($id);
        if(!$photo){
            return back();
        }
        return view('backend.user.edit_photo', compact('photo','weddings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, string $id)
    {
        $photo = photos::find($id);
        $request->validate([
            'id_wedding' => 'required',
            'photo_url' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'caption' => 'required',
        ]);

        $foto = $photo->photo_url;
        if($request->hasFile('photo_url')){
            if ($foto){
                Storage::disk('public')->delete($foto);
            }
            $uniqueField = uniqid() . '_' . $request->file('photo_url')->getClientOriginalName();

            $request->file('photo_url')->storeAs('photo',  $uniqueField, 'public');

            $foto = 'photo/' . $uniqueField;
>>>>>>> 1db6e1ccb6bbaaf28f19b62b7238803221838536
        }


        $photo->update([
            'id_wedding'=> $request->id_wedding,
            'photo_url' => $foto,
            'caption' => $request->caption,
        ]);

        return redirect()->route('user.photo')->with('success', 'Data photo Berhasil di Edit');
    }

    public function deleteUser($id)
    {
        $photo = photos::find($id);


         $photos->delete();

        return redirect()->back()->with('success', 'Data photo Berhasil diHapus');

    }

}
