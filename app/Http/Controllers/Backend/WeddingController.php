<?php

namespace App\Http\Controllers\Backend;

use App\Models\comments;
use App\Models\events;
use App\Models\love_story;
use App\Models\photos;
use App\Models\weddings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WeddingController
{
    public function weddings()
    {
        $weddings = weddings::all();
        return view('backend.admin.weddings', compact('weddings'));
    }


    public function detail()
    {
        $details = weddings::all();
        $events = events::all();
        $love_storys = love_story::all();
        $comments = comments::all();
        $photos = photos::all();
        return view('backend.admin.detail', compact('details', 'events', 'love_storys', 'comments', 'photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.weddings_tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_user = Auth::user()->id_user;
        $request->validate([
            'title' => 'required',
            'bride_name' => 'required',
            'groom_name' => 'required',
            'wedding_date' => 'required',
            'wedding_time' => 'required',
            'location' => 'required',
            'message' => 'required',
            'unique_url' => 'required|unique:weddings,unique_url'
        ]);

        weddings::create([
            'id_user' => $id_user,
            'title' => $request->title,
            'bride_name' => $request->bride_name,
            'groom_name' => $request->groom_name,
            'wedding_date' => $request->wedding_date,
            'wedding_time' => $request->wedding_time,
            'location' => $request->location,
            'message' => $request->message,
            'unique_url' => $request->unique_url,
        ]);

        return redirect()->route('admin.weddings')->with('success', 'Data Weddings Berhasil di Tambah');
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
        $wedding = weddings::find($id);
        if (!$wedding) {
            return back();
        }
        return view('backend.admin.edit_weddings', compact('wedding'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $wedding = weddings::find($id);
        $id_user = Auth::user()->id_user;
        $request->validate([
            'title' => 'required',
            'bride_name' => 'required',
            'groom_name' => 'required',
            'wedding_date' => 'required',
            'wedding_time' => 'required',
            'location' => 'required',
            'message' => 'required',
            'unique_url' => 'required|unique:weddings,unique_url,' . $wedding->id_wedding . ',id_wedding'

        ]);
        $wedding->update([
            'id_user' => $id_user,
            'title' => $request->title,
            'bride_name' => $request->bride_name,
            'groom_name' => $request->groom_name,
            'wedding_date' => $request->wedding_date,
            'wedding_time' => $request->wedding_time,
            'location' => $request->location,
            'message' => $request->message,
            'unique_url' => $request->unique_url,
        ]);

        return redirect()->route('admin.weddings')->with('success', 'Data Weddings Berhasil di Edit');
    }


    public function delete($id)
    {
        $wedding = weddings::find($id);


        $wedding->delete();

        return redirect()->back()->with('success', 'Data Weddings Berhasil diHapus');
    }

    public function weddingsUser()
    {
        $weddings = weddings::all();
        return view('backend.user.weddings', compact('weddings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUser()
    {
        return view('backend.user.weddings_tambah');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function storeUser(Request $request)
    {
        $id_user = Auth::user()->id_user;

        // Validasi data
        $request->validate([
            'title' => 'required',
            'bride_name' => 'required',
            'groom_name' => 'required',
            'wedding_date' => 'required',
            'wedding_time' => 'required',
            'location' => 'required',
            'message' => 'required',
        ]);

        // Generate unique URL dari title
        $unique_url = Str::slug($request->title);

        // Pastikan unique_url tidak duplikat di database
        $counter = 1;
        while (weddings::where('unique_url', $unique_url)->exists()) {
            $unique_url = Str::slug($request->title) . '-' . $counter;
            $counter++;
        }

        // Simpan data
        weddings::create([
            'id_user' => $id_user,
            'title' => $request->title,
            'bride_name' => $request->bride_name,
            'groom_name' => $request->groom_name,
            'wedding_date' => $request->wedding_date,
            'wedding_time' => $request->wedding_time,
            'location' => $request->location,
            'message' => $request->message,
            'unique_url' => $unique_url,
        ]);

        return redirect()->route('user.weddings')->with('success', 'Data Weddings Berhasil di Tambah');
    }

    public function editUser(string $id)
    {
        $wedding = weddings::find($id);
        if (!$wedding) {
            return back();
        }
        return view('backend.user.edit_weddings', compact('wedding'));
    }

    public function updateUser(Request $request, string $id)
{
    $wedding = weddings::find($id);

    if (!$wedding) {
        return back()->with('error', 'Data Weddings tidak ditemukan.');
    }

    $id_user = Auth::user()->id_user;

    // Validasi data
    $request->validate([
        'title' => 'required',
        'bride_name' => 'required',
        'groom_name' => 'required',
        'wedding_date' => 'required',
        'wedding_time' => 'required',
        'location' => 'required',
        'message' => 'required',
    ]);

    // Generate unique URL dari title
    $unique_url = Str::slug($request->title);

    // Pastikan unique_url tidak duplikat di database, kecuali milik record yang sedang diedit
    $counter = 1;
    $base_url = $unique_url; // Simpan URL dasar
    while (weddings::where('unique_url', $unique_url)->where('id_wedding', '!=', $wedding->id_wedding)->exists()) {
        $unique_url = $base_url . '-' . $counter;
        $counter++;
    }

    // Update data
    $wedding->update([
        'id_user' => $id_user,
        'title' => $request->title,
        'bride_name' => $request->bride_name,
        'groom_name' => $request->groom_name,
        'wedding_date' => $request->wedding_date,
        'wedding_time' => $request->wedding_time,
        'location' => $request->location,
        'message' => $request->message,
        'unique_url' => $unique_url,
    ]);

    return redirect()->route('user.weddings')->with('success', 'Data Weddings Berhasil di Edit');
}


    public function deleteUser($id)
    {
        $wedding = weddings::find($id);


        $wedding->delete();

        return redirect()->back()->with('success', 'Data Weddings Berhasil diHapus');
    }
}
