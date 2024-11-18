@extends('backend.admin.layout.app')

@section('title','responsive')

@section('content')
<div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap align-middle mb-0" id="rsvp" >
                        <thead>
                        <tr class="border-2 border-bottom border-primary border-0">
                                <th scope="col" class="ps-0">NO</th>
                                <th scope="col" class="text-center">TITTLE</th>
                                <th scope="col" class="text-center">NAMA </th>
                                <th scope="col" class="text-center">EMAIL</th>
                                <th scope="col" class="text-center">PHONE</th>
                                <th scope="col" class="text-center">PESAN</th>
                                <th scope="col" class="text-center">KEHADIRAN</th>
                                <th scope="col" class="text-center">TOTAL TAMU</th>
                                <th scope="col" class="text-center">ACTION</th>
                    
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                    @foreach($rsvps as $rsvp)

                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td  class="text-center">{{$rsvp->wedding->title}}</td>
                        <td class="text-center">{{$rsvp->name}}</td>
                        <td class="text-center">{{$rsvp->email}}</td>
                        <td class="text-center">{{$rsvp->phone}}</td>
                        <td class="text-center">{{$rsvp->message}}</td>
                        <td class="text-center">{{$rsvp->total_guest}}</td>
                        <td>
                            <a href="{{route('admin.edit_rsvp', $rsvp->id_rsvp)}}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{route('admin.delete_rsvp', $rsvp->id_rsvp)}}" onclick="return confirm('Yakin Ingin Menghapus Data Tersebut')" class="btn btn-danger btn-sm">delete</a>
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
        $('#rsvp').DataTable();
    });
</script>

@endsection