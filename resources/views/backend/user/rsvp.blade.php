@extends('backend.user.layout.app')

@section('title','RSVP')

@section('content')
<div class="row g-4">
    <div class="col-lg-12">
        <div class="bg-light rounded h-100 p-4">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <h4 class="mb-4">RSVP</h4>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap align-middle mb-0" id="rsvp">
                            <thead>
                                <tr class="border-2 border-bottom border-primary border-0">
                                    <th scope="col" class="ps-0">No</th>
                                    <th scope="col" class="text-center">Title</th>
                                    <th scope="col" class="text-center">Nama </th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Phone</th>
                                    <th scope="col" class="text-center">Pesan</th>
                                    <th scope="col" class="text-center">Kehadiran</th>
                                    <th scope="col" class="text-center">Total Tamu</th>

                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach($rsvps as $rsvp)

                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td class="text-center">{{$rsvp->wedding->title}}</td>
                                    <td class="text-center">{{$rsvp->name}}</td>
                                    <td class="text-center">{{$rsvp->email}}</td>
                                    <td class="text-center">{{$rsvp->phone}}</td>
                                    <td class="text-center">{{$rsvp->message}}</td>
                                    <td class="text-center">{{$rsvp->total_guest}}</td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="" onclick="return confirm('Yakin Ingin Menghapus Data Tersebut')" class="btn btn-danger btn-sm">delete</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#rsvp').DataTable();
    });
</script>

@endsection