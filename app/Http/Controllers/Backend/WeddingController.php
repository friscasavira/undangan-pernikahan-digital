<?php

namespace App\Http\Controllers\Backend;

use App\Models\weddings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WeddingController
{
    public function weddings()
    {
        $weddings = weddings::all();
        return view('backend.admin.weddings', compact('weddings'));
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
            'id_user'=> $id_user,
            'title' => $request->title,
            'bride_name' => $request->bride_name,
            'groom_name' => $request->groom_name,
            'wedding_date' => $request->wedding_date,
            'wedding_time' => $request->wedding_time,
            'location' => $request->location,
            'message' => $request->message,
            'unique_url' => $request->unique_url,
        ]);

        return redirect()->route('admin.weddings')->with('success','Data Weddings Berhasil di Tambah'); 
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
        if(!$wedding){
            return back();
        }
        return view('admin.edit_weddings', compact('wedding'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $wedding = weddings::find($id);
        $request->validate([
            'id_user'=>'required',
           'title' => 'required',
            'bride_name' => 'required',
            'groom_name' => 'required',
            'wedding_date' => 'required',
            'wedding_time' => 'required',
            'location' => 'required',
            'message' => 'required',
            'unique_url' => 'required|unique:wedding,unique_url,' . $wedding->id_wedding . ',id_wedding'
            
        ]);
        $wedding->update([
            'id_user'=> $request->id_user,
           'title' => $request->title,
            'bride_name' => $request->bride_name,
            'groom_name' => $request->groom_name,
            'wedding_date' => $request->wedding_date,
            'wedding_time' => $request->wedding_time,
            'location' => $request->location,
            'message' => $request->message,
            'unique_url' => $request->unique_url,
        ]);

        return redirect()->route('admin.Weddings')->with('success', 'Data Weddings Berhasil di Edit');
    }


    public function delete($id)
    {
        $wedding = weddings::find($id);
        

         $wedding->delete();

        return redirect()->back()->with('success', 'Data Weddings Berhasil diHapus');
    

    }
}
