@extends('backend.user.layout.app')

@section('title','responsive')

@section('content')
<div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap align-middle mb-0" id="rsvp" >
                        <thead>
                        <tr class="border-2 border-bottom border-primary border-0">
                                <th scope="col" class="ps-0">No</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Message</th>

                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                    @foreach($comments as $comment)

                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td class="text-center">{{$comment->name_tamu}}</td>
                        <td class="text-center">{{$comment->message}}</td>

                    </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
        $('#comment').DataTable();
    });
</script>

@endsection
