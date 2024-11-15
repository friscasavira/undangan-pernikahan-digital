@extends('backend.admin.layout.app')

@section('tittle','Edit event')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit event</h6>
                <form action="{{route('admin.events_update', $event->id_event)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_wedding" class="form-label">JUDUL</label>
                        <select name="id_wedding" id="id_wedding" class="form-select">
                        <option value="">PILIH</option>
                        @foreach($weddings as $wedding)
                        <option value="{{ $wedding->id_wedding }}" {{$event->id_wedding == $wedding->id_wedding ? 'selected' : ''}}>{{$wedding->title}}</option>
                        @endforeach
                        </select>
                        <div class="text-danger">
                            @error('id_wedding')
                            {{$message}}
                            @enderror
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="event_name" class="form-label">NAMA ACARA</label>
                        <input type="text" class="form-control" id="event_name" name="event_name" value="{{old('event_name', $event->event_name)}}">
                        <div class="text-danger">
                            @error('event_name')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="event_date" class="form-label">TANGGAL ACARA</label>
                        <input type="date" class="form-control" id="event_date" name="event_date" value="{{old('event_date', $event->event_date)}}">
                        <div class="text-danger">
                            @error('event_date')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                        <div class="mb-3">
                            <label for="event_time" class="form-label">WAKTU ACARA</label>
                            <input type="time" class=" form-control" id="event_time" name="event_time" value="{{old('event_time', $event->event_time)}}">
                            <div class="text-danger">
                                @error('event_time')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="event_location" class="form-label">LOKASI ACARA</label>
                            <input type="text" class="form-control" id="event_location" name="event_location" value="{{old('event_location', $event->event_location)}}">
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