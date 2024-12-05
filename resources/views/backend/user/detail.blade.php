@extends('backend.user.layout.app')

@section('title', 'Weddings')

@section('content')
    <div class="col-lg-12">
        <div class="bg-light rounded h-100 p-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h4 class="mb-4">Events</h4>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{ route('user.events_tambah', $id) }}" class="btn btn-primary btn-sm">Tambah</a>
                        <table class="table text-nowrap align-middle mb-0" id="events">
                            <thead>
                                <tr class="border-2 border-bottom border-primary border-0">
                                    <th scope="col" class="ps-0">No</th>
                                    <th scope="col" class="text-center">Nama Acara</th>
                                    <th scope="col" class="text-center">Tanggal Acara</th>
                                    <th scope="col" class="text-center">Waktu Acara</th>
                                    <th scope="col" class="text-center">Lokasi Acara</th>
                                    <th scope="col" class="text-center">Deskripsi</th>
                                    <th scope="col" class="text-center">Actions</th>

                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($events as $event)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $event->event_name }}</td>
                                        <td>{{ $event->event_date }}</td>
                                        <td>{{ $event->event_time }}</td>
                                        <td>{{ $event->event_location }}</td>
                                        <td>{{ $event->event_description }}</td>
                                        <td>
                                            <a href="{{ route('user.edit_events', ['id_wedding' => $event->id_wedding, 'id_event' => $event->id_event]) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ route('user.delete_events', ['id_wedding' => $event->id_wedding, 'id_event' => $event->id_event]) }}"
                                                onclick="return confirm('Yakin Ingin Menghapus Data Tersebut')"
                                                class="btn btn-danger btn-sm">delete</a>
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
                $('#events').DataTable();
            });
        </script>

        <div class="row g-4">
            <div class="col-lg-12">
                <div class="bg-light rounded h-100 p-4">
                    <h4 class="mb-4">Love Story</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <a href="{{ route('user.love_story_tambah', $id) }}"
                                    class="btn btn-primary btn-sm">Tambah</a>
                                <table class="table text-nowrap align-middle mb-0" id="love_story">
                                    <thead>
                                        <tr class="border-2 border-bottom border-primary border-0">
                                            <th scope="col" class="ps-0">No</th>
                                            <th scope="col" class="text-center">Photo</th>
                                            <th scope="col" class="text-center">Tanggal Story</th>
                                            <th scope="col" class="text-center">Description</th>
                                            <th scope="col" class="text-center">Action</th>


                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($love_storys as $love_story)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    <img src="{{ asset('storage/' . $love_story->photo_url) }}"
                                                        alt="" height="30">
                                                </td>
                                                <td>{{ $love_story->date_story }}</td>
                                                <td>{{ $love_story->description_story }}</td>
                                                <td>
                                                    <a href="{{ route('user.edit_love_story', $love_story->id_wedding) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="{{ route('user.delete_love_story', $love_story->id_wedding) }}"
                                                        onclick="return confirm('Yakin Ingin Menghapus Data Tersebut')"
                                                        class="btn btn-danger btn-sm">delete</a>
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
                $('#love_story').DataTable();
            });
        </script>

        <div class="row g-4">
            <div class="col-lg-12">
                <div class="bg-light rounded h-100 p-4">
                    <h4 class="mb-4">Comment</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-nowrap align-middle mb-0" id="comment">
                                    <thead>
                                        <tr class="border-2 border-bottom border-primary border-0">
                                            <th scope="col" class="ps-0">No</th>
                                            <th scope="col" class="text-center">Name</th>
                                            <th scope="col" class="text-center">Message</th>

                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($comments as $comment)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td class="text-center">{{ $comment->name_tamu }}</td>
                                                <td class="text-center">{{ $comment->message }}</td>

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
                $('#comment').DataTable();
            });
        </script>

        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h4 class="mb-4">Photo</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <a href="{{ route('user.photo_tambah', $id) }}" class="btn btn-primary btn-sm">Tambah</a>
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
                                        @foreach ($photos as $photo)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $photo->wedding->title }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $photo->photo_url) }}" alt=""
                                                        height="30">
                                                </td>
                                                <td>{{ $photo->caption }}</td>
                                                <td>
                                                    <a href="{{ route('user.edit_photo', $photo->id_photo) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="{{ route('user.delete_photo', $photo->id_photo) }}"
                                                        onclick="return confirm('Yakin ingin hapus data?')"
                                                        class="btn btn-danger btn-sm">Hapus</a>
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
