@extends('backend.admin.layout.app')

@section('title','love_story')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <!-- <a href="{{route('admin.love_story_tambah')}}" class="btn btn-primary btn-sm">Tambah</a> -->
                <table class="table text-nowrap align-middle mb-0" id="love_story">
                    <thead>
                        <tr class="border-2 border-bottom border-primary border-0">
                            <th scope="col" class="ps-0">NO</th>
                            <th scope="col" class="text-center">TITTLE</th>
                            <th scope="col" class="text-center">foto </th>
                            <th scope="col" class="text-center">TANGGAL</th>
                            <th scope="col" class="text-center">JUDUL</th>
                            <th scope="col" class="text-center">description</th>
                            <th scope="col" class="text-center">ACTION</th>

                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach($love_storys as $love_story)

                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td class="text-center">{{$love_story->wedding->title}}</td>
                            <td class="text-center">{{$love_story->photo_url}}</td>
                            <td class="text-center">{{$love_story->date_story}}</td>
                            <td class="text-center">{{$love_story->tittle_story}}</td>
                            <td class="text-center">{{$love_story->description_story}}</td>
                            <td>
                                <a href="{{route('admin.edit_love_story', $love_story->id_story)}}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{route('admin.delete_love_story', $love_story->id_story)}}" onclick="return confirm('Yakin Ingin Menghapus Data Tersebut')" class="btn btn-danger btn-sm">delete</a>
                            </td>
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