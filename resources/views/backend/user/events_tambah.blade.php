@extends('backend.user.layout.app')

@section('title','Tambah Event')

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
                    <h6 class="mb-4">Tambah event</h6>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('user.events_store', $id_wedding)}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="event_name" class="form-label">Nama Acara</label>
                                    <input type="text" class="form-control" id="event_name" name="event_name">
                                    <div class="text-danger">
                                        @error('event_name')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="event_date" class="form-label">Tanggal Acara</label>
                                    <input type="date" class="form-control" id="event_date" name="event_date">
                                    <div class="text-danger">
                                        @error('event_date')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="event_time" class="form-label">Waktu Acara</label>
                                    <input type="time" class="form-control" id="event_time" name="event_time">
                                    <div class="text-danger">
                                        @error('event_time')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="event_location" class="form-label">Lokasi Acara</label>
                                    <input type="text" class="form-control" id="event_location" name="event_location">
                                    <div class="text-danger">
                                        @error('event_location')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="event_description" class="form-label">Deskripsi</label>
                                    <textarea name="event_description" id="event_description" rows="5" class="form-control"></textarea>
                                    <div class="text-danger">
                                        @error('event_description')
                                        {{$message}}
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
</div>


@endsection
