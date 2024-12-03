<?php

namespace App\Http\Controllers\Backend;

use App\Models\comments;
use App\Models\weddings;
use Illuminate\Http\Request;

class CommentController
{

    
    

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */

    public function edit(string $id)
    {
        $weddings = weddings::all();
        $comments = comments::find($id);
        if(!$comments){
            return back();
        }
        return view('backend.admin.edit_comment', compact('comments','weddings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comments = comments::find($id);
        $request->validate([
            'id_wedding' => 'required',
            'name_tamu' => 'required',
            'message' => 'required',
        ]);


        $comments->update([
            'id_wedding'=> $request->id_wedding,
            'name_tamu' => $request->name_tamu,
            'message' => $request->message,
        ]);

        return redirect()->route('admin.detail', $id)->with('success', 'Data comments Berhasil di Edit');
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
