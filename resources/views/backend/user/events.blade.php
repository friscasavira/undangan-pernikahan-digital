@extends('backend.user.layout.app')

@section('title','Events')

@section('content')
<div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <a href="{{route('user.events_tambah')}}" class="btn btn-primary btn-sm">Tambah</a>
                    <table class="table text-nowrap align-middle mb-0" id="weddings" >
                        <thead>
                            <tr class="border-2 border-bottom border-primary border-0">
                                <th scope="col" class="ps-0">No</th>
                                <th scope="col">Tittle</th>
                                <th scope="col" class="text-center">Nama Acara</th>
                                <th scope="col" class="text-center">Tanggal Acara</th>
                                <th scope="col" class="text-center">Waktu Acara</th>
                                <th scope="col" class="text-center">Lokasi Acara</th>
                                <th scope="col" class="text-center">Actions</th>

                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                    @foreach($events as $event)

                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$event->wedding->title}}</td>
                        <td>{{$event->event_name}}</td>
                        <td>{{$event->event_date}}</td>
                        <td>{{$event->event_time}}</td>
                        <td>{{$event->event_location}}</td>
                        <td>
                            <a href="{{route('user.edit_events', $event->id_event)}}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{route('user.delete_events', $event->id_event)}}" onclick="return confirm('Yakin Ingin Menghapus Data Tersebut')" class="btn btn-danger btn-sm">delete</a>
                        </td>

                    </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
        $('#events').DataTable();
    });
</script>

@endsection
