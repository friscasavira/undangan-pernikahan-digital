@extends('backend.admin.layout.app')

@section('tittle','Edit photo')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit event</h6>
                <form action="{{route('admin.photo_store', ['id_wedding' => $photos->id_wedding, 'id' => $photos->id_photo])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_wedding" class="form-label">JUDUL</label>
                        <select name="id_wedding" id="id_wedding" class="form-select">
                        <option value="">PILIH</option>
                        @foreach($weddings as $wedding)
                        <option value="{{ $wedding->id_wedding }}">{{$wedding->title}}</option>
                        @endforeach
                        </select>
                        <div class="text-danger">
                            @error('id_wedding')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="photo_url" class="form-label">FOTO</label>
                        <input type="file" class="form-control" id="photo_url" name="photo_url">
                        <div class="text-danger">
                        @error('photo_url')
                        {{$message}}
                        @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="caption" class="form-label">CAPTION</label>
                        <input type="text" class="form-control" id="caption" name="caption">
                        <div class="text-danger">
                        @error('caption')
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