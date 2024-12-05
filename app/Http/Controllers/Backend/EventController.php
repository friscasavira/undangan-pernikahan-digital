<?php

namespace App\Http\Controllers\Backend;

use App\Models\events;
use App\Models\weddings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController
{


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weddings = weddings::all();
        return view('backend.admin.tambah_events',compact('weddings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_wedding' => 'required',
            'event_name' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'event_location' => 'required',
            'event_description' => 'required',
        ]);

        events::create([
            'id_wedding'=> $request->id_wedding,
            'event_name' => $request->event_name,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'event_location' => $request->event_location,
            'event_description' => $request->event_description,
        ]);

        return redirect()->route('admin.events')->with('success','Data Events Berhasil di Tambah');
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
        $event = events::find($id);
        if(!$event){
            return back();
        }
        return view('backend.admin.edit_events', compact('event','weddings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = events::find($id);
        $request->validate([
            'id_wedding' => 'required',
            'event_name' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'event_location' => 'required',
            'event_description' => 'required',
        ]);


        $event->update([
            'id_wedding'=> $request->id_wedding,
            'event_name' => $request->event_name,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'event_location' => $request->event_location,
            'event_description' => $request->event_description,
        ]);

        return redirect()->route('admin.detail', $id)->with('success', 'Data Events Berhasil di Edit');
    }


    public function delete($id)
    {
        $event = events::find($id);


         $event->delete();

        return redirect()->back()->with('success', 'Data Events Berhasil diHapus');


    }

    public function eventsUser()
    {
        $events = events::all();
        return view('backend.user.events', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUser($id_wedding)
    {
        return view('backend.user.events_tambah',compact('id_wedding'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeUser(Request $request, $id_wedding)
    {
        $request->validate([
            'event_name' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'event_location' => 'required',
            'event_description' => 'required',
        ]);

        events::create([
            'id_wedding'=> $id_wedding,
            'event_name' => $request->event_name,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'event_location' => $request->event_location,
            'event_description' => $request->event_description,
        ]);

        return redirect()->route('user.detail', $id_wedding)->with('success','Data Events Berhasil di Tambah');
    }

    public function editUser(string $id_wedding, $id_event)
    {
        $event = events::find($id_event);
        if(!$event){
            return back();
        }
        return view('backend.user.edit_events', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, string $id_wedding, $id_event)
    {
        $event = events::find($id_event);
        $request->validate([
            'event_name' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'event_location' => 'required',
            'event_description' => 'required',
        ]);


        $event->update([
            'id_wedding'=> $id_wedding,
            'event_name' => $request->event_name,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'event_location' => $request->event_location,
            'event_description' => $request->event_description,
        ]);

        return redirect()->route('user.detail', $id_wedding)->with('success', 'Data Events Berhasil di Edit');
    }


    public function deleteUser($id_wedding, $id_event)
    {
        $event = events::find($id_event);

        $event->delete();

        return redirect()->back()->with('success', 'Data Events Berhasil diHapus');


    }
}
