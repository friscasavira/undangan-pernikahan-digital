<?php

namespace App\Http\Controllers\Frontend;

use App\Models\events;
use App\Models\love_story;
use App\Models\photos;
use App\Models\rsvp;
use App\Models\settings;
use App\Models\weddings;
use Illuminate\Http\Request;

class WeddingController
{
    public function home($unique_url)
    {
        // Cari wedding berdasarkan unique_url
        $wedding = weddings::where('unique_url', $unique_url)->first();

        // Jika tidak ditemukan, redirect atau tampilkan halaman 404
        if (!$wedding) {
            abort(404, 'Wedding not found');
        }

        // Ambil data lainnya berdasarkan id_wedding dari wedding yang ditemukan
        $id_wedding = $wedding->id_wedding;
        $love_storys = love_story::where('id_wedding', $id_wedding)->get();
        $events = events::where('id_wedding', $id_wedding)->get();
        $photos = photos::where('id_wedding', $id_wedding)->take(8)->get();
        $photosThree = photos::where('id_wedding', $id_wedding)->take(3)->get();
        $setting = settings::first();

        // Kirim data ke view
        return view('frontend.home', compact('wedding', 'love_storys', 'events', 'photos', 'photosThree', 'setting', 'unique_url'));
    }

    public function photo($unique_url)
    {
        $wedding = weddings::where('unique_url', $unique_url)->first();
        $id_wedding = $wedding->id_wedding;
        $photos = photos::where('id_wedding', $id_wedding)->get();
        return view('frontend.photo', compact('photos'));
    }

    public function rsvp(Request $request, $unique_url)
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

        return redirect()->route('home', $unique_url)->with('success', 'RSVP Anda berhasil dikirim!');
    }

    public function view()
    {
        return view('frontend.tampilan_awal');
    }
}
