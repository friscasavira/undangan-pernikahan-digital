@extends('backend.user.layout.app')

@section('title', 'Edit Setting')

@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Edit Setting</h6>
            <form action="{{ route('user.setting_update', $setting->id_settings) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="id_wedding" class="form-label">Judul</label>
                    <select name="id_wedding" id="id_wedding" class="form-select">
                    <option value="">Pilih</option>
                    @foreach($weddings as $wedding)
                    <option value="{{ $wedding->id_wedding }}">{{$wedding->title}}</option>
                    @endforeach
                    </select>
                    <div class="text-danger">
                        @error('id_wedding')
                        {{$message}}
                        @enderror
                    </div>
                <div class="mb-3">
                    <label for="cover_photo" class="form-label">Cover Photo</label>
                    <input type="file" class="form-control" id="cover_photo" name="cover_photo">
                    <div class="text-danger">
                        @error('cover_photo')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="background_music" class="form-label">Background Music</label>
                    <input type="file" class="form-control" id="background_music" name="background_music">
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
@endsection
