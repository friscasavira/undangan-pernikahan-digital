@extends('backend.admin.layout.app')

@section('tittle','Tambah photo')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah photo</h6>
                <form action="{{route('admin.photo_store')}}" method="post" enctype="multipart/form-data">
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
                        <label for="photo" class="form-label">FOTO</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                        <div class="text-danger">
                        @error('photo')
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