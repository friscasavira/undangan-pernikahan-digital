@extends('backend.admin.layout.app')

@section('title','Admin Edit Love Story')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit love_story</h6>
                <form action="{{route('admin.love_story_update', ['id_wedding' => $love_story->id_wedding, 'id' => $love_story->id_story])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_wedding" class="form-label">JUDUL</label>
                        <select name="id_wedding" id="id_wedding" class="form-select">
                            <option value="">PILIH</option>
                            @foreach($weddings as $wedding)
                            <option value="{{ $wedding->id_wedding }}" {{$love_story->id_wedding == $wedding->id_wedding ? 'selected' : ''}}>{{$wedding->title}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('id_wedding')
                            {{$message}}
                            @enderror
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="photo_url" class="form-label">NAMA ACARA</label>
                        <input type="text" class="form-control" id="photo_url" name="photo_url" value="{{old('photo_url', $love_story->photo_url)}}">
                        <div class="text-danger">
                            @error('photo_url')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="date_story" class="form-label">TANGGAL ACARA</label>
                        <input type="date" class="form-control" id="date_story" name="date_story" value="{{old('date_story', $love_story->date_story)}}">
                        <div class="text-danger">
                            @error('date_story')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tittle_story" class="form-label">WAKTU ACARA</label>
                        <input type="text" class=" form-control" id="tittle_story" name="tittle_story" value="{{old('tittle_story', $love_story->tittle_story)}}">
                        <div class="text-danger">
                            @error('tittle_story')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description_story" class="form-label">LOKASI ACARA</label>
                        <input type="text" class="form-control" id="description_story" name="description_story" value="{{old('description_story', $love_story->description_story)}}">
                        <div class="text-danger">
                            @error('description_story')
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