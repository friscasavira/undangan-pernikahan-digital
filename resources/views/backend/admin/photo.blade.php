@extends('backend.admin.layout.app')

@section('title','photo')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <!-- <a href="{{route('admin.photo_tambah')}}" class="btn btn-primary btn-sm">Tambah</a> -->
                
                            <div class="container mt-5">
                                @foreach($photos as $photo)
                                <div class="card" style="width: 18rem;">
                                <a href="{{route('admin.edit_photo', ['id_wedding' => $photo->id_wedding, 'id' => $photo->id_photo])}}">
                                        <img src="{{asset('storage/' . $photo->photo_url)}}" class="card-img-top" alt="matdash-img">
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text text-center">{{$photo->caption}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <!-- Bootstrap JS (Optional) -->
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
                        
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