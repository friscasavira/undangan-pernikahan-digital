<?php

namespace App\Http\Controllers\Backend;

use App\Models\comments;
use App\Models\weddings;
use Illuminate\Http\Request;

class CommentController
{
    public function commentUser()
    {
        $comment = comments::all();
        return view('backend.user.comment', compact('comment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUser()
    {
        $weddings = weddings::all();
        return view('backend.user.tambah_comment',compact('weddings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeUser(Request $request)
    {
        $request->validate([
            'id_wedding' => 'required',
            'name'=> 'required',
            'message'=> 'required',
        ]);

        comments::create([
            'id_wedding'=> $request->id_wedding,
            'name'=> $request->id_wedding,
            'message'=> $request->id_wedding,
        ]);

        return redirect()->route('user.comment')->with('success','Data comment Berhasil di Tambah');
    }

}
