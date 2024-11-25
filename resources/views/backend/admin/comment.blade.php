@extends('backend.admin.layout.app')

@section('title','comment')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{route('admin.comment_tambah')}}" class="btn btn-primary btn-sm">Tambah</a>


                <thead>
                            <tr class="border-2 border-bottom border-primary border-0">
                                <th scope="col" class="ps-0">NO</th>
                                <th scope="col" class="text-center">TITTLE</th>
                                <th scope="col" class="text-center">NAMA</th>
                                <th scope="col" class="text-center">PESAN</th>
                                <th scope="col" class="text-center">ACTION</th>
                    
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                    @foreach($comments as $comment)

                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td  class="text-center">{{$comment->wedding->title}}</td>
                        <td class="text-center">{{$comment->name}}</td>
                        <td class="text-center">{{$comment->message}}</td>
                        <td>
                            <a href="{{route('admin.edit_comments', $comment->id_comment)}}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{route('admin.delete_comments', $comment->id_comment)}}" onclick="return confirm('Yakin Ingin Menghapus Data Tersebut')" class="btn btn-danger btn-sm">delete</a>
                        </td>

                    </tr>
                        @endforeach
                        </tbody>

                



                
            </div>
        </div>
    </div>
</div>

    <script>
        $(document).ready(function() {
            $('#').DataTable();
        });
    </script>

    @endsection