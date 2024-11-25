<?php

namespace App\Http\Controllers\Backend;

use App\Models\comments;
use App\Models\weddings;
use Illuminate\Http\Request;

class CommentController
{

    
    public function comment()
    {
        $comments = comments::all();
        return view('backend.admin.comment', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weddings = weddings::all();
        return view('backend.admin.tambah_comment',compact('weddings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        return redirect()->route('admin.comment')->with('success','Data comment Berhasil di Tambah');
    }

    public function edit(string $id)
    {
        $weddings = weddings::all();
        $comments = comments::find($id);
        if(!$comments){
            return back();
        }
        return view('backend.admin.edit_comments', compact('comments','comments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comments = comments::find($id);
        $request->validate([
            'id_wedding' => 'required',
            'photo_url' => 'required',
            'date_story' => 'required',
            'tittle_story' => 'required',
            'description_story' => 'required',
        ]);


        $comments->update([
            'id_wedding'=> $request->id_wedding,
            'photo_url' => $request->photo_url,
            'date_story' => $request->date_story,
            'tittle_story' => $request->tittle_story,
            'description_story' => $request->description_story,
        ]);

        return redirect()->route('admin.comments')->with('success', 'Data comments Berhasil di Edit');
    }


    public function delete($id)
    {
        $comments = comments::find($id);


         $comments->delete();

        return redirect()->back()->with('success', 'Data comments Berhasil diHapus');


    }

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
