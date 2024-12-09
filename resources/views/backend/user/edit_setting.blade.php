@extends('backend.user.layout.app')

@section('title', 'Edit Setting')

@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Edit Setting</h6>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.setting_update', $setting->id_settings) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="cover_photo" class="form-label">Cover Photo</label>
                            <input type="file" class="form-control" id="cover_photo" name="cover_photo">
                            @if ($setting->cover_photo)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $setting->cover_photo) }}" alt="Cover Photo Saat Ini" height="100">
                                </div>
                            @endif
                            <div class="text-danger">
                                @error('cover_photo')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="background_music" class="form-label">Background Music</label>
                            <input type="file" class="form-control" id="background_music" name="background_music">
                            @if ($setting->background_music)
                                <div class="mt-2">
                                    <p>File saat ini: {{ basename($setting->background_music) }}</p>
                                </div>
                            @endif
                            <div class="text-danger">
                                @error('background_music')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
