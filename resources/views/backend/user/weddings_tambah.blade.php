@extends('backend.user.layout.app')

@section('title','Tambah Wedding')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah Wedding</h6>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('user.weddings_store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                                <div class="text-danger">
                                    @error('title')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="bride_name" class="form-label">Nama Mempelai Wanita</label>
                                <input type="text" class="form-control" id="bride_name" name="bride_name">
                                <div class="text-danger">
                                    @error('bride_name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="groom_name" class="form-label">Nama Mempelai Pria</label>
                                <input type="text" class="form-control" id="groom_name" name="groom_name">
                                <div class="text-danger">
                                    @error('groom_name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="wedding_date" class="form-label">Tanggal Pernikahan</label>
                                <input type="date" class="form-control" id="wedding_date" name="wedding_date">
                                <div class="text-danger">
                                    @error('wedding_date')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="wedding_time" class="form-label">Waktu Pernikahan</label>
                                <input type="time" class="form-control" id="wedding_time" name="wedding_time">
                                <div class="text-danger">
                                    @error('wedding_time')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="location" class="form-label">Alamat Pernikahan</label>
                                <input type="text" class="form-control" id="location" name="location">
                                <div class="text-danger">
                                    @error('location')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Pesan</label>
                                <textarea name="message" id="message" class="form-control" rows="5"></textarea>
                                <div class="text-danger">
                                    @error('message')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="bride_photo" class="form-label">Bride Photo</label>
                                <input type="file" class="form-control" id="bride_photo" name="bride_photo" onchange="previewImage('bride_photo_preview', event)">
                                <div class="mt-2">
                                    <img id="bride_photo_preview" src="#" alt="Bride Photo Preview"
                                        style="max-width: 150px; max-height: 150px; display: none; object-fit: cover;">
                                </div>
                                <div class="text-danger">
                                    @error('bride_photo')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="groom_photo" class="form-label">Groom Photo</label>
                                <input type="file" class="form-control" id="groom_photo" name="groom_photo" onchange="previewImage('groom_photo_preview', event)">
                                <div class="mt-2">
                                    <img id="groom_photo_preview" src="#" alt="Groom Photo Preview"
                                        style="max-width: 150px; max-height: 150px; display: none; object-fit: cover;">
                                </div>
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
</div>

@endsection