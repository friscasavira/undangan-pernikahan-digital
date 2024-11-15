@extends('backend.admin.layout.app')

@section('title','Weddings')

@section('content')
<div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <a href="{{route('admin.events_tambah')}}" class="btn btn-primary btn-sm">Tambah</a>
                    <table class="table text-nowrap align-middle mb-0" id="event" >
                        <thead>
                            <tr class="border-2 border-bottom border-primary border-0">
                                <th scope="col" class="ps-0">NO</th>
                                <th scope="col" class="text-center">TITTLE</th>
                                <th scope="col" class="text-center">NAMA ACARA</th>
                                <th scope="col" class="text-center">TANGGAL ACARA</th>
                                <th scope="col" class="text-center">WAKTU ACARA</th>
                                <th scope="col" class="text-center">LOKASI ACARA</th>
                                <th scope="col" class="text-center">ACTION</th>
                    
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                    @foreach($events as $event)

                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td  class="text-center">{{$event->wedding->title}}</td>
                        <td class="text-center">{{$event->event_name}}</td>
                        <td class="text-center">{{$event->event_date}}</td>
                        <td class="text-center">{{$event->event_time}}</td>
                        <td class="text-center">{{$event->event_location}}</td>
                        <td>
                            <a href="{{route('admin.edit_events', $event->id_event)}}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{route('admin.delete_events', $event->id_event)}}" onclick="return confirm('Yakin Ingin Menghapus Data Tersebut')" class="btn btn-danger btn-sm">delete</a>
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
        $('#event').DataTable();
    });
</script>

@endsection