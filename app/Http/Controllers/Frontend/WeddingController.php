<?php

namespace App\Http\Controllers\Frontend;

use App\Models\events;
use App\Models\love_story;
use App\Models\photos;
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
        $photos = photos::where('id_wedding', $id_wedding)->take(3)->get();
        return view('frontend.home', compact('wedding', 'love_storys', 'events', 'photos'));
    }
}
