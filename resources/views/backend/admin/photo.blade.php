@extends('backend.admin.layout.app')

@section('title','Weddings')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{route('admin.photo_tambah')}}" class="btn btn-primary btn-sm">Tambah</a>
                <table class="table text-nowrap align-middle mb-0" id="event">
                    <thead>
                        <!DOCTYPE html>
                        <html lang="en">

                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Foto dengan Caption</title>
                            <!-- Bootstrap CSS -->
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
                        </head>

                        <body>
                            <div class="container mt-5">
                                <div class="card" style="width: 18rem;">
                                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <p class="card-text text-center">Ini adalah caption untuk gambar.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Bootstrap JS (Optional) -->
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
                        </body>

                        </html>






                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#event').DataTable();
    });
</script>

@endsection