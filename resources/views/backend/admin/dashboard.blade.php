@extends('backend.admin.layout.app')

@section('title', 'Dashboard')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-nowrap align-middle mb-0" id="dashboard">
                    <div class="row">
                        @foreach($weddings as $wedding)
                        <div class="col-lg-4">
                            <div class="card overflow-hidden hover-img">
                                <div class="position-relative">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('asset_admin/images/blog/blog-img1.jpg')}}" class="card-img-top" alt="matdash-img">
                                    </a>
                                </div>
                                <div class="card-body p-4">
                                    <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary" href="{{route('admin.weddings')}}">{{$wedding->title}}</a>
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

                                        <div class="d-flex align-items-center fs-2 ms-auto">
                                            <a class="ti ti-point text-dark link-primary" href="{{route('admin.weddings')}}">{{$wedding->wedding_date}}</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#dashboard').DataTable();
    });
</script>
@endsection