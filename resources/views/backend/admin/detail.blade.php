@extends('backend.admin.layout.app')

@section('title','Weddings')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card shadow">
            <div class="card-header bg-primary">
                <h4 class="text-white mb-0">Event</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-nowrap align-middle mb-0" id="event">
                    <thead>
                        <tr class="border-2 border-bottom border-primary border-0">
                            <th scope="col" class="ps-0">NO</th>
                            <th scope="col" class="text-center">TITTLE</th>
                            <th scope="col" class="text-center">NAMA ACARA</th>
                            <th scope="col" class="text-center">TANGGAL ACARA</th>
                            <th scope="col" class="text-center">WAKTU ACARA</th>
                            <th scope="col" class="text-center">LOKASI ACARA</th>
                            <th scope="col" class="text-center">DESKRIPSI</th>
                            <th scope="col" class="text-center">ACTION</th>

                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach($events as $event)

                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td class="text-center">{{$event->wedding->title}}</td>
                            <td class="text-center">{{$event->event_name}}</td>
                            <td class="text-center">{{$event->event_date}}</td>
                            <td class="text-center">{{$event->event_time}}</td>
                            <td class="text-center">{{$event->event_location}}</td>
                            <td class="text-center">{{$event->event_description}}</td>
                            <td>
                                <a href="{{route('admin.edit_events', ['id_wedding' => $event->id_wedding, 'id' => $event->id_event])}}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{~route('admin.delete_events', ['id_wedding' => $event->id_wedding, 'id' => $event->id_event])}}" onclick="return confirm('Yakin Ingin Menghapus Data Tersebut')" class="btn btn-danger btn-sm">delete</a>
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



<div class="col-lg-12">
    <div class="card">
        <div class="card shadow">
            <div class="card-header bg-primary ">
                <h4 class="text-white mb-0" >Love Story</h4>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
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
                                <a href="{{route('admin.edit_love_story', ['id_wedding' => $love_story->id_wedding, 'id' => $love_story->id_story])}}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{route('admin.delete_love_story', ['id_wedding' => $love_story->id_wedding, 'id' => $love_story->id_story])}}" onclick="return confirm('Yakin Ingin Menghapus Data Tersebut')" class="btn btn-danger btn-sm">delete</a>
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



<div class="col-lg-12">
    <div class="card">
        <div class="card shadow">
            <div class="card-header bg-primary">
                <h4 class=" text-white mb-0">Komentar</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-primary text-center">
                            <tr>
                                <th scope="col" class="ps-3">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Pesan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                            <tr>
                                <th scope="row" class="text-center">{{$loop->iteration}}</th>



                                <td class="text-center">{{$comment->wedding->title}}</td>
                                <td class="text-center">{{$comment->name_tamu}}</td>
                                <td class="text-center">{{$comment->message}}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.edit_comment', ['id_wedding' => $comment->id_wedding, 'id' => $comment->id_comments])}}"
                                        class="btn btn-warning btn-sm me-2">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{route('admin.delete_comment', ['id_wedding' => $comment->id_wedding, 'id' => $comment->id_comments])}}"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </a>
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

<script>
    $(document).ready(function() {
        $('#').DataTable();
    });
</script>



<div class="col-lg-12">
    <div class="card">
        <div class="card shadow">
            <div class="card-header bg-primary">
                <h4 class=" text-white mb-0">Foto</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table>
                    @foreach($photos as $photo)
                    <div class="card" style="width: 18rem;">
                        <a href="{{route('admin.edit_photo', ['id_wedding' => $photo->id_wedding, 'id' => $photo->id_photo])}}">
                            <img src="{{asset('storage/' . $photo->photo_url)}}" class="card-img-top" alt="matdash-img">
                        </a>
                        <div class="card-body">
                            <p class="card-text text-center">{{$photo->caption}}</p>
                        </div>
                    </div>
                    @endforeach 
                </table>
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