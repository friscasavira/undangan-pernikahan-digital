@extends('backend.admin.layout.app')

@section('tittle','Tambah love_story')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah love_story</h6>
                <form action="{{route('admin.love_story_store')}}" method="post" enctype="multipart/form-data">
                    @csrf

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
                        <label for="photo_url" class="form-label">foto</label>
                        <input type="file" class="form-control" id="photo_url" name="photo_url" >
                        <div class="text-danger">
                            @error('photo_url')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="date_story" class="form-label">TANGGAL</label>
                        <input type="date" class="form-control" id="date_story" name="date_story" >
                        <div class="text-danger">
                            @error('date_story')
                            {{$message}}
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tittle_story" class="form-label">jUDUL</label>
                            <input type="text" class="form-control" id="tittle_story" name="tittle_story">
                            <div class="text-danger">
                                @error('tittle_story')
                                {{$message}}
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">description_story</label>
                                <input type="text" class="form-control" id="description_story" name="description_story" >
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