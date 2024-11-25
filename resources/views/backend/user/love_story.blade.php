@extends('backend.user.layout.app')

@section('title','Love_story')

@section('content')
<div class="col-lg-12">
    <div class="bg-light rounded h-100 p-4">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <a href="{{route('user.love_story_tambah')}}" class="btn btn-primary btn-sm">Tambah</a>
                    <table class="table text-nowrap align-middle mb-0" id="weddings" >
                        <thead>
                            <tr class="border-2 border-bottom border-primary border-0">
                                <th scope="col" class="ps-0">No</th>
                                <th scope="col">Tittle</th>
                                <th scope="col" class="text-center">Photo</th>
                                <th scope="col" class="text-center">Tanggal Story</th>
                                <th scope="col" class="text-center">Judul Story</th>
                                <th scope="col" class="text-center">Description</th>
                                <th scope="col" class="text-center">Action</th>


                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                    @foreach($love_storys as $love_story)

                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$love_story->wedding->title}}</td>
                        <td>
                            <img src="{{ asset('storage/'. $love_story->photo_url) }}" alt="" height="30">
                        </td>
                        <td>{{$love_story->date_story}}</td>
                        <td>{{$love_story->tittle_story}}</td>
                        <td>{{$love_story->description_story}}</td>
                        <td>
                            <a href="{{route('user.edit_love_story', $love_story->id_story)}}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{route('user.delete_love_story', $love_story->id_story)}}" onclick="return confirm('Yakin Ingin Menghapus Data Tersebut')" class="btn btn-danger btn-sm">delete</a>
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
        $('#love_story').DataTable();
    });
</script>

@endsection
