@extends('backend.user.layout.app')

@section('title', 'Tambah Love Story')

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
                        <form action="{{ route('user.love_story_store', $id_wedding) }}" method="POST" enctype="multipart/form-data">
                            @csrf
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
                                <textarea name="description_story" id="description_story" rows="5" class="form-control"></textarea>
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
</div>
@endsection
