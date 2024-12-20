@extends('backend.user.layout.app')

@section('title','Edit Wedding')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Wedding</h6>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('user.weddings_update', $wedding->id_wedding)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{old('title', $wedding->title)}}">
                                    <div class="text-danger">
                                        @error('title')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="bride_name" class="form-label">Nama Mempelai Wanita</label>
                                    <input type="text" class="form-control" id="bride_name" name="bride_name" value="{{old('bride_name', $wedding->bride_name)}}">
                                    <div class="text-danger">
                                        @error('bride_name')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="groom_name" class="form-label">Nama Mempelai Pria</label>
                                    <input type="text" class="form-control" id="groom_name" name="groom_name" value="{{old('groom_name', $wedding->groom_name)}}">
                                    <div class="text-danger">
                                        @error('groom_name')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="wedding_date" class="form-label">Tanggal Pernikahan</label>
                                    <input type="date" class="form-control" id="wedding_date" name="wedding_date" value="{{old('wedding_date', $wedding->wedding_date)}}">
                                    <div class="text-danger">
                                        @error('wedding_date')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="weddiing_time" class="form-label">WAKTU Pernikhan</label>
                                    <input type="time" class="form-control" id="weddiing_time" name="wedding_time" value="{{old('wedding_time', $wedding->wedding_time)}}">
                                    <div class="text-danger">
                                        @error('weddiing_time')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="location" class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" id="location" name="location" value="{{old('location', $wedding->location)}}">
                                    <div class="text-danger">
                                        @error('location')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="message" class="form-label">Pesan</label>
                                    <textarea name="message" id="message" class="form-control" rows="5">{{ $wedding->message }}</textarea>
                                    <div class="text-danger">
                                        @error('message')
                                        {{$message}}
                                        @enderror

                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="bride_photo" class="form-label">Bride Photo</label>
                                    <input type="file" class="form-control" id="bride_photo" name="bride_photo">
                                    @if ($wedding->bride_photo)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $wedding->bride_photo) }}"
                                            class="img-fluid rounded"
                                            style="max-width: 200px; max-height: 150px; object-fit: cover;"
                                            alt="Bride Photo">
                                    </div>
                                    @endif
                                    <div class="text-danger">
                                        @error('bride_photo')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="groom_photo" class="form-label">Groom Photo</label>
                                    <input type="file" class="form-control" id="groom_photo" name="groom_photo">
                                    @if ($wedding->groom_photo)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $wedding->groom_photo) }}"
                                            class="img-fluid rounded"
                                            style="max-width: 200px; max-height: 150px; object-fit: cover;"
                                            alt="Groom Photo">
                                    </div>
                                    @endif
                                    <div class="text-danger">
                                        @error('groom_photo')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">SAVE</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        @endsection