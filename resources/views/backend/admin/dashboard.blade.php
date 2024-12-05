@extends('backend.admin.layout.app')

@section('title', 'Admin Dashboard')

@section('content')
<style>
    .search-input {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .btn-search {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        background-color: #e0e0e0;
        /* Warna latar abu-abu default */
        border: none;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-search:hover {
        background-color: #d6d6d6;
        /* Warna latar abu-abu sedikit lebih gelap saat di-hover */
    }

    .btn-search i {
        color: #333;
        /* Warna ikon default */
    }

    .btn-search:hover i {
        color: #000;
        /* Warna ikon saat di-hover */
    }
</style>
<div class="col-lg-12">
    <form method="GET" action="{{ route('admin.dashboard') }}">
        <div class="row justify-content-end">
            <div class="col-lg-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control search-input" placeholder="Cari judul pernikahan..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-search">
                        <i class="ti ti-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
    <br>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="row">
                    @foreach($weddings as $wedding)
                    <div class="col-lg-4">
                        <div class="card overflow-hidden hover-img">
                            <div class="position-relative">
                                @if ($wedding->photos->isNotEmpty() && $wedding->photos->first()->photo_url)
                                <img src="{{ asset('storage/' . $wedding->photos->first()->photo_url) }}" class="card-img-top" alt="matdash-img">
                                @else
                                <p>Belum ada foto</p>
                                @endif
                            </div>
                            <div class="card-body p-4">
                                <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary" href="{{route('admin.detail', $wedding->id_wedding)}}">{{$wedding->title}}</a>
                                <div class="d-flex align-items-center gap-4">

                                    <div class="d-flex align-items-center gap-2">
                                        <a class="ti ti-eye text-dark fs-5 link-primary" href="{{route('admin.weddings')}}">
                                            @if($wedding->rsvp == null)
                                            0
                                            @else
                                            {{$wedding->rsvp->sum('total_guests')}}
                                            @endif
                                        </a>
                                    </div>

                                    <div class="d-flex align-items-center gap-2">
                                        <a class="ti ti-message-2 text-dark fs-5 link-primary" href="{{route('admin.weddings')}}"></a>
                                    </div>

                                    <div class="d-flex align-items-center gap-2">
                                        <a class="ti ti-message-2 text-dark fs-5 link-primary" href="{{route('admin.rsvp', $wedding->id_wedding)}}">RSVP</a>
                                    </div>

                                    <div class="d-flex align-items-center fs-2 ms-auto">
                                        <a class="ti ti-point text-dark link-primary" href="">{{$wedding->wedding_date}}</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection