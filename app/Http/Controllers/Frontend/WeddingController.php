<?php

namespace App\Http\Controllers\Frontend;

use App\Models\events;
use App\Models\love_story;
use App\Models\photos;
use App\Models\rsvp;
use App\Models\weddings;
use Illuminate\Http\Request;

class WeddingController
{
    public function home()
    {
        $wedding = weddings::all()->first();
        $id_wedding = $wedding->id_wedding;
        $love_storys = love_story::all();
        $events = events::all();
        $photos = photos::where('id_wedding', $id_wedding)->take(8)->get();
        $photosThree = photos::where('id_wedding', $id_wedding)->take(3)->get();
        return view('frontend.home', compact('wedding', 'love_storys', 'events', 'photos', 'photosThree'));
    }

    public function photo()
    {
        $photos = photos::all();
        return view('frontend.photo', compact('photos'));
    }

    public function rsvp(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:rsvp,email',
            'phone' => 'required',
            'message' => 'required',
            'attendance_status' => 'required',
            'total_guests' => 'required',
            'is_invited' => 'required',
        ]);

        $wedding = weddings::first();

        rsvp::create([
            'id_wedding' => $wedding->id_wedding,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'attendance_status' => $request->attendance_status,
            'total_guests' => $request->total_guests,
            'is_invited' => $request->is_invited,            
        ]);

        return redirect()->route('home')->with('success', 'RSVP Anda berhasil dikirim!');
    }

    public function updateWeddingPhotos(Request $request)
{
    $wedding = weddings::first();  // Mengambil wedding pertama, bisa disesuaikan jika lebih dari 1 wedding

    // Validasi file foto yang diupload
    $request->validate([
        'bride_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'groom_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Upload foto bride
    if ($request->hasFile('bride_photo')) {
        $bridePhoto = $request->file('bride_photo')->store('images/bride', 'public');
        $wedding->bride_photo = $bridePhoto;
    }
    if ($request->hasFile('groom_photo')) {
        $groomPhoto = $request->file('groom_photo')->store('images/groom', 'public');
        $wedding->groom_photo = $groomPhoto;
    }    

    // Simpan perubahan di database
    $wedding->save();

    return redirect()->route('home')->with('success', 'Foto pengantin berhasil diperbarui!');
}



}


