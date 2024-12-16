@extends('backend.user.layout.app')

@section('title', 'Settings')

@section('content')

<div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <h4 class="mb-4">Settings</h4>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @if ($settings->isEmpty())
                            <a href="{{ route('user.setting_tambah') }}" class="btn btn-primary btn-sm mb-3">Tambah</a>
                        @endif
                        <table class="table" id="photo">
                            <thead>
                                <tr>
                                    <th scope="col" class="ps-0">No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Cover Photo</th>
                                    <th scope="col">Background Music</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $setting->wedding->title }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $setting->cover_photo) }}"
                                            alt="Cover Photo" height="50">
                                    </td>
                                    <td>
                                        <audio controls>
                                            <source src="{{ asset('storage/' . $setting->background_music) }}"
                                                type="audio/mpeg">
                                        </audio>
                                    </td>
                                    <td>
                                        <a href="{{ route('user.edit_setting', $setting->id_settings) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
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
