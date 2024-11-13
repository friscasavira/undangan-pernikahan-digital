<?php

namespace App\Http\Controllers\Frontend;

use App\Models\weddings;
use Illuminate\Http\Request;

class WeddingController
{
    public function home()
    {
        $wedding = weddings::all()->first();
        return view('frontend.home', compact('wedding'));
    }
}
