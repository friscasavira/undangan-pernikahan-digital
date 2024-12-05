@extends('backend.user.layout.app')

@section('title', 'Edit Photo')

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
            <h6 class="mb-4">Edit Photo</h6>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.photo_update', $photo->id_wedding) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="photo_url" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="photo_url" name="photo_url">
                            @if ($photo->photo_url)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $photo->photo_url) }}" alt="Foto Saat Ini" height="100">
                                </div>
                            @endif
                            <div class="text-danger">
                                @error('photo_url')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="caption" class="form-label">Caption</label>
                            <input type="text" class="form-control" id="caption" name="caption"
                                   value="{{ old('caption', $photo->caption) }}">
                            <div class="text-danger">
                                @error('caption')
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
