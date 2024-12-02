@extends('backend.admin.layout.app')

@section('tittle','Edit Comment')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit comment</h6>
                <form action="{{route('admin.comment_update', ['id_wedding' => $comments->id_wedding, 'id' => $comments->id_comments])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_wedding" class="form-label">JUDUL</label>
                        <select name="id_wedding" id="id_wedding" class="form-select">
                        <option value="">PILIH</option>
                        @foreach($weddings as $wedding)
                        <option value="{{ $wedding->id_wedding }}" {{$comments->id_wedding == $wedding->id_wedding ? 'selected' : ''}}>{{$wedding->title}}</option>
                        @endforeach
                        </select>
                        <div class="text-danger">
                            @error('id_wedding')
                            {{$message}}
                            @enderror
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="name_tamu" class="form-label">NAMA</label>
                        <input type="text" class="form-control" id="name_tamu" name="name_tamu" value="{{old('name_tamu', $comments->name_tamu)}}">
                        <div class="text-danger">
                            @error('name_tamu')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">PESAN</label>
                        <input type="text" class="form-control" id="message" name="message" value="{{old('message', $comments->message)}}">
                        <div class="text-danger">
                            @error('message')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                        <button type="submit" class="btn btn-primary">SAVE</button>

                </form>
            </div>
        </div>

    </div>


    @endsection