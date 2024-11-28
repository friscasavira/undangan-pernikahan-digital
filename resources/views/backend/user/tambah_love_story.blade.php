@extends('backend.user.layout.app')

@section('title', 'Tambah Love_story')

@section('content')
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Tambah Photo</h6>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('user.love_story_store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="id_wedding" class="form-label">Judul</label>
                                    <select name="id_wedding" id="id_wedding" class="form-select">
                                        <option value="">Pilih</option>
                                        @foreach ($weddings as $wedding)
                                            <option value="{{ $wedding->id_wedding }}">{{ $wedding->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger">
                                        @error('id_wedding')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="photo_url" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="photo_url" name="photo_url">
                                    <div class="text-danger">
                                        @error('photo_url')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_story" class="form-label">Tanggal Story</label>
                                    <input type="date" class="form-control" id="date_story" name="date_story">
                                    <div class="text-danger">
                                        @error('date_story')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="judul_story" class="form-label">Judul Story</label>
                                    <input type="text" class="form-control" id="tittle_story" name="tittle_story">
                                    <div class="text-danger">
                                        @error('tittle_story')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description_story"
                                        name="description_story">
                                    <div class="text-danger">
                                        @error('description_story')
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
