@extends('backend.user.layout.app')

@section('title', 'Photo')

@section('content')

<div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <h4 class="mb-4">Photo</h4>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{ route('user.photo_tambah') }}" class="btn btn-primary btn-sm">Tambah</a>
                        <table class="table" id="photo">
                            <thead>
                                <tr>
                                    <th scope="col" class="ps-0">No</th>
                                    <th scope="col">Tittle</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Caption</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($photos as $photo )
                                <tr>
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td>{{$photo->wedding->title}}</td>
                                    <td>
                                        <img src="{{ asset('storage/'. $photo->photo_url) }}" alt="" height="30">
                                    </td>
                                    <td>{{ $photo->caption}}</td>
                                    <td>
                                        <a href="{{ route('user.edit_photo', $photo->id_photo) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ route('user.delete_photo', $photo->id_photo) }}" onclick="return confirm('Yakin ingin hapus data?')" class="btn btn-danger btn-sm">Hapus</a>
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
        $('#photo').DataTable();
    });
</script>

@endsection