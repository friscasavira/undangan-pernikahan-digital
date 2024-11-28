@extends('backend.admin.layout.app')

@section('tittle','Tambah Wedding')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah Wedding</h6>
                <form action="{{route('admin.weddings_store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">TITLE</label>
                        <input type="text" class="form-control" id="title" name="title">
                        <div class="text-danger">
                            @error('title')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bride_name" class="form-label">NAMA MEMPELAI WANITA</label>
                        <input type="text" class="form-control" id="bride_name" name="bride_name">
                        <div class="text-danger">
                        @error('bride_name')
                        {{$message}}
                        @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="groom_name" class="form-label">NAMA MEMPELAI PRIA</label>
                        <input type="text" class="form-control" id="groom_name" name="groom_name">
                        <div class="text-danger">
                        @error('groom_name')
                        {{$message}}
                        @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="wedding_date" class="form-label">TANGGAL PERNIKAHAN</label>
                        <input type="date" class="form-control" id="wedding_date" name="wedding_date">
                        <div class="text-danger">
                        @error('wedding_date')
                        {{$message}}
                        @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="wedding_time" class="form-label">WAKTU PERNIKAHAN</label>
                        <input type="time" class="form-control" id="wedding_time" name="wedding_time">
                        <div class="text-danger">
                        @error('wedding_time')
                        {{$message}}
                        @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">ALAMAT PERNIKAHAN</label>
                        <input type="text" class="form-control" id="location" name="location">
                        <div class="text-danger">
                        @error('location')
                        {{$message}}
                        @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">PESAN</label>
                        <input type="text" class="form-control" id="message" name="message">
                        <div class="text-danger">
                        @error('message')
                        {{$message}}
                        @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="unique_url" class="form-label">LINK</label>
                        <input type="text" class="form-control" id="unique_url" name="unique_url">
                        <div class="text-danger">
                        @error('unique_url')
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
