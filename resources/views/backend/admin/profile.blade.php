@extends('backend.admin.layout.app')

@section('tittle', 'Profile')

@section('content')

<div class="row g-4 justify-content-center">
    <div class="col-6">
        <div class="bg-light rounded h-100 p-4">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success')}}
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.profile_update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{old ('username', $profile ->username)}}">
                            <div class="text-danger">
                                @error('username')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <div class="text-danger">
                                @error('password')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old ('name', $profile ->name)}}">
                            <div class="text-danger">
                                @error('name')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">SAVE</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection