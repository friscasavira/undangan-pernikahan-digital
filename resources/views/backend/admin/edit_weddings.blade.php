@extends('backend.admin.layout.app')

@section('title','Admin Edit Wedding')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Wedding</h6>
                <form action="{{route('admin.weddings_update', $wedding->id_wedding)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title', $wedding->title)}}">
                        <div class="text-danger">
                            @error('title')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bride_name" class="form-label">NAMA MEMPELAI WANITA</label>
                        <input type="text" class="form-control" id="bride_name" name="bride_name" value="{{old('bride_name', $wedding->bride_name)}}">
                        <div class="text-danger">
                        @error('bride_name')
                        {{$message}}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="groom_name" class="form-label">NAMA MEMPELAI PRIA</label>
                        <input type="text" class="form-control" id="groom_name" name="groom_name" value="{{old('groom_name', $wedding->groom_name)}}">
                        <div class="text-danger">
                        @error('groom_name')
                        {{$message}}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="wedding_date" class="form-label">TANGGAL PERNIKAHAN</label>
                        <input type="date" class="form-control" id="wedding_date" name="wedding_date"  value="{{old('wedding_date', $wedding->wedding_date)}}">
                        <div class="text-danger">
                        @error('wedding_date')
                        {{$message}}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="weddiing_time" class="form-label">WAKTU PERNIKAHAN</label>
                        <input type="time" class="form-control" id="weddiing_time" name="wedding_time" value="{{old('wedding_time', $wedding->wedding_time)}}">
                        <div class="text-danger">
                        @error('weddiing_time')
                        {{$message}}
                        @enderror

                    <div class="mb-3">
                        <label for="location" class="form-label">LOKASI</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{old('location', $wedding->location)}}">
                        <div class="text-danger">
                        @error('location')
                        {{$message}}
                        @enderror

                    <div class="mb-3">
                        <label for="message" class="form-label">PESAN</label>
                        <input type="text" class="form-control" id="message" name="message" value="{{old('message', $wedding->message)}}">
                        <div class="text-danger">
                        @error('message')
                        {{$message}}
                        @enderror
                    
                    <button type="submit" class="btn btn-primary">SAVE</button>

                </form>
            </div>
        </div>

    </div>


    @endsection