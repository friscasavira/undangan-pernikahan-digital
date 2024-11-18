<?php

namespace App\Http\Controllers\Backend;

use App\Models\photos;
use App\Models\weddings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController
{
    public function photo()
    {
        $photos = photos::all();
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

            $request->file('photo_url')->storeAs('photo_url_pernikahan', $uniqueField, 'public');

            $photo_url = 'photo_url_pernikahan/' . $uniqueField;
        }
       
        photos::create([
            'id_wedding'=> $request->id_wedding,
            'photo_url' => $request->photo_url,
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
        $photo = photos::find($id);
        if(!$photo){
            return back();
        }
        return view('backend.admin.edit_photo', compact('photo','weddings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $photo = photos::find($id);
        $request->validate([
            'id_wedding' => 'required',
            'photo_url' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'caption' => 'required',
        ]);

        $foto = $photo->foto;
        if($request->hasFile('foto')){
            if ('foto'){
                Storage::disk('public')->delete($foto);
            }
            $uniqueField = uniqid() . '_' . $request->file('foto')->getClientOriginalName();

            $request->file('foto')->storeAs('foto_pernikahan',  $uniqueField, 'public');

            $foto = 'foto_pernikahan/' . $uniqueField;
        }
            

        $photo->update([
            'id_wedding'=> $request->id_wedding,
            'photo_url' => $request->photo_url,
            'caption' => $request->caption,
        ]);

        return redirect()->route('admin.photo')->with('success', 'Data photo Berhasil di Edit');
    }


    public function delete($id)
    {
        $photo = photos::find($id);
        

         $photo->delete();

        return redirect()->back()->with('success', 'Data photo Berhasil diHapus');
    

    

    
        $photo = photos::find($id);
        $foto = $photo->foto;

        if($photo->foto) {
            if(Storage::disk('public')->exists($foto)){
               Storage::disk('public')->delete($foto);
        }


        }

         $photo->delete();

        return redirect()->back()->with('Success', 'Data Guru Berhasil diHapus');
    }


}
