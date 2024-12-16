<?php

namespace App\Http\Controllers\Backend;

use App\Models\rsvp;
use App\Models\weddings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RsvpController
{
    public function rsvp()
    {
        $rsvps = rsvp::all();
        return view('backend.admin.rsvp', compact('rsvps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weddings = weddings::all();
        return view('backend.admin.tambah_rsvp',compact('weddings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_wedding' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'attendance_status' => 'required',
            'total_guests' => 'required',
            'is_invited' => 'required',
        ]);

        rsvp::create([
            'id_wedding'=> $request->id_wedding,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'attendance_status' => $request->attendance_status,
            'total_guests' => $request->total_guests,
            'is_invited' => $request->is_invited,            
        ]);

        return redirect()->route('admin.rsvp')->with('success','Data rsvp Berhasil di Tambah');
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
        $rsvp = rsvp::find($id);
        if(!$rsvp){
            return back();
        }
        return view('backend.admin.edit_rsvp', compact('rsvp','weddings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rsvp = rsvp::find($id);
        $request->validate([
            'id_wedding' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'attendance_status' => 'required',
        ]);


        $rsvp->update([
            'id_wedding'=> $request->id_wedding,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'attendance_status' => $request->attendance_status,
        ]);

        return redirect()->route('admin.rsvp')->with('success', 'Data rsvp Berhasil di Edit');
    }

    public function rsvpUser()
    {
        $id_user = Auth::user()->id_user;
        $wedding = weddings::where('id_user', $id_user)->first();
        $rsvps = rsvp::where('id_wedding', $wedding->id_wedding)->get();
        return view('backend.user.rsvp', compact('rsvps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUser()
    {
        $weddings = weddings::all();
        return view('backend.user.tambah_rsvp',compact('weddings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeUser(Request $request)
    {
        $request->validate([
            'id_wedding' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'attendance_status' => 'required',
        ]);

        rsvp::create([
            'id_wedding'=> $request->id_wedding,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'attendance_status' => $request->attendance_status,
        ]);

        return redirect()->route('user.rsvp')->with('success','Data rsvp Berhasil di Tambah');
    }

}
