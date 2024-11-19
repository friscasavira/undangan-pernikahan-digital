<?php

namespace App\Http\Controllers\Frontend;

use App\Models\events;
use App\Models\love_story;
use App\Models\weddings;
use Illuminate\Http\Request;

class WeddingController
{
    public function home()
    {
        $wedding = weddings::all()->first();
        $love_storys = love_story::all();
        $events = events::all();
        return view('frontend.home', compact('wedding', 'love_storys', 'events'));
    }
}
