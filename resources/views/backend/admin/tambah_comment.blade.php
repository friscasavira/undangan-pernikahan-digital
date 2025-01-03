@extends('backend.admin.layout.app')

@section('tittle','Tambah love_story')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah love_story</h6>
                <form action="{{route('admin.love_story_store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="container mt-5">
                        <h3 class="mb-4">Comments</h3>

                        <div class="mb-3">
                            <label for="id_wedding" class="form-label">JUDUL</label>
                            <select name="id_wedding" id="id_wedding" class="form-select">
                                <option value="">PILIH</option>
                                @foreach($weddings as $wedding)
                                <option value="{{ $wedding->id_wedding }}">{{$wedding->title}}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                @error('id_wedding')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <!-- Comment Form -->
                        <form class="mb-4">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">`
                                <label for="message" class="form-label">message</label>
                                <textarea class="form-control" id="message" rows="3" placeholder="Write your comment here" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                        </form>

                </form>
            </div>
        </div>

    </div>


    @endsection
