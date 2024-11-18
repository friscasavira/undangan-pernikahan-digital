@extends('backend.user.layout.app')

@section('tittle','Tambah event')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah event</h6>
                <form action="{{route('user.events_store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="id_wedding" class="form-label">Judul</label>
                        <select name="id_wedding" id="id_wedding" class="form-select">
                        <option value="">Pilih</option>
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
                        <label for="event_name" class="form-label">Nama Acara</label>
                        <input type="text" class="form-control" id="event_name" name="event_name" >
                        <div class="text-danger">
                            @error('event_name')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="event_date" class="form-label">Tanggal Acara</label>
                        <input type="date" class="form-control" id="event_date" name="event_date" >
                        <div class="text-danger">
                            @error('event_date')
                            {{$message}}
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="event_time" class="form-label">Waktu Acara</label>
                            <input type="time" class="form-control" id="event_time" name="event_time">
                            <div class="text-danger">
                                @error('event_time')
                                {{$message}}
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="event_location" class="form-label">Lokasi Acara</label>
                                <input type="text" class="form-control" id="event_location" name="event_location" >
                                <div class="text-danger">
                                    @error('event_location')
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
