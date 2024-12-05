@extends('backend.admin.layout.app')

@section('title','Admin Edit Rsvp')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Rsvp</h6>
                <form action="{{route('admin.rsvp_update', $rsvp->id_rsvp)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_wedding" class="form-label">JUDUL</label>
                        <select name="id_wedding" id="id_wedding" class="form-select">
                            <option value="">PILIH</option>
                            @foreach($weddings as $wedding)
                            <option value="{{ $wedding->id_wedding }}" {{$rsvp->id_wedding == $wedding->id_wedding ? 'selected' : ''}}>{{$wedding->title}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('id_wedding')
                            {{$message}}
                            @enderror
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">NAMA</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name', $guest->name)}}">
                        <div class="text-danger">
                            @error('name')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">EMAIL</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email', $guest->email)}}">
                        <div class="text-danger">
                            @error('email')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">PHONE</label>
                        <input type="text" class=" form-control" id="phone" name="phone" value="{{old('phone', $guest->phone)}}">
                        <div class="text-danger">
                            @error('phone')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">PESAN</label>
                        <textarea name="message" id="message" rows="5" class="form-control">{{$rsvp->message}}</textarea>
                        <div class="text-danger">
                        @error('message')
                        {{$message}}
                        @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="attendance_status" class="form-label">KEHADIRAN</label>
                        <select name="attendance_status" id="attendance_status" class="form-select">
                            <option value="">PILIH</option>
                            <option value="Belum Konfirmasi" {{ $guest->attendance_status == 'Belum Konfirmasi' ? 'selected' : '' }}>Belum konfirmansi</option>
                            <option value="Hadir" {{ $guest->attendance_status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="Tidak Hadir" {{ $guest->attendance_status == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                        </select>
                        <div class="text-danger">
                            @error('id_wedding')
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