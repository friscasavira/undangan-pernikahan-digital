@extends('backend.admin.layout.app')

@section('title','Weddings')

@section('content')
<div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <a href="{{route('admin.weddings_tambah')}}" class="btn btn-primary btn-sm">Tambah</a>
                    <table class="table text-nowrap align-middle mb-0" id="weddings" >
                        <thead>
                            <tr class="border-2 border-bottom border-primary border-0">
                                <th scope="col" class="ps-0">NO</th>
                                <th scope="col">Tittle</th>
                                <th scope="col" class="text-center">NAMA PENGANTIN WANITA</th>
                                <th scope="col" class="text-center">NAMA PENGANTIN PRIA</th>
                                <th scope="col" class="text-center">TANGGAL PERNIKAHAN</th>
                                <th scope="col" class="text-center">WAKTU PERNIKAHAN</th>
                                <th scope="col" class="text-center">LOKASI PERNIKAHAN</th>
                                <th scope="col" class="text-center">PESAN</th>
                                <th scope="col" class="text-center">LINK</th>
                                <th scope="col" class="text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                    @foreach($weddings as $wedding)

                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$wedding->title}}</td>
                        <td>{{$wedding->bride_name}}</td>
                        <td>{{$wedding->groom_name}}</td>
                        <td>{{$wedding->wedding_date}}</td>
                        <td>{{$wedding->wedding_time}}</td>
                        <td>{{$wedding->location}}</td>
                        <td>{{$wedding->message}}</td>
                        <td>{{$wedding->unique_url}}</td>
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

<script>
    $(document).ready(function() {
        $('#weddings').DataTable();
    });
</script>

@endsection