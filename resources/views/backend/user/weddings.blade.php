@extends('backend.user.layout.app')

@section('title','Weddings')

@section('content')
<div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <a href="{{route('user.weddings_tambah')}}" class="btn btn-primary btn-sm">Tambah</a>
                    <table class="table text-nowrap align-middle mb-0" id="weddings" >
                        <thead>
                            <tr class="border-2 border-bottom border-primary border-0">
                                <th scope="col" class="ps-0">No</th>
                                <th scope="col">Tittle</th>
                                <th scope="col" class="text-center">Nama Pengantin Wanita</th>
                                <th scope="col" class="text-center">Nama Pengantin Pria</th>
                                <th scope="col" class="text-center">Tanggal Pernikahan</th>
                                <th scope="col" class="text-center">Waktu Pernikahan</th>
                                <th scope="col" class="text-center">Lokasi Pernikahan</th>
                                <th scope="col" class="text-center">Pesan</th>
                                <th scope="col" class="text-center">Link</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                    @foreach($weddings as $wedding)

                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$wedding->title}}</td>
                        <td>{{$wedding->bride_name}}</td>
                        <td>{{$wedding->groom_name}}</td>
                        <td class="text-start">{{$wedding->wedding_date}}</td>
                        <td>{{$wedding->wedding_time}}</td>
                        <td>{{$wedding->location}}</td>
                        <td>{{$wedding->message}}</td>
                        <td>{{$wedding->unique_url}}</td>
                        <td>
                            <a href="{{route('user.edit_weddings', $wedding->id_wedding)}}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{route('user.delete_weddings', $wedding->id_wedding)}}" onclick="return confirm('Yakin Ingin Menghapus Data Tersebut')" class="btn btn-danger btn-sm">delete</a>
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
        $('#weddings').DataTable();
    });
</script>

@endsection
