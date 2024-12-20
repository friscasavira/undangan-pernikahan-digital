@extends('backend.user.layout.app')

@section('title', 'Tambah Photo')

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
            <h6 class="mb-4">Tambah Photo</h6>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.photo_store', $id_wedding ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="photo_url" name="photo_url">
                            <div class="text-danger">
                                @error('photo_url')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="caption" class="form-label">Caption</label>
                            <input type="text" class="form-control" id="caption" name="caption">
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
