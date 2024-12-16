<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Wedding</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

	<link rel="shortcut icon" type="image/jpg" href="{{ asset('asset_main/img/pernikahan1.jpg') }}" />
    </head>
<body>
    <!-- Header -->
    <style>
        .nav-link {
            color: #343a40; /* Warna teks menu */
        }

        

        .btn-masuk {
            background-color: #ffb5c1;
            color: black;
            border-radius: 10px;
        }

        .btn-masuk:hover {
            background-color: #ff99a8;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <div class="d-flex align-items-center">
                <img src="{{ asset('asset_main/img/pernikahan1.jpg') }}" alt="Logo" style="height: 30px; margin-right: 8px;">
                <h1 class="h5 mb-0 text-dark">Our Wedding</h1>
            </div>

            <!-- Buttons -->
            <div>
                <a href="{{route('user.register')}}" class="btn btn-outline-secondary me-2">Daftar</a>
                <a href="{{route('user.login')}}" class="btn btn-masuk">Masuk</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-light text-center py-5">
        <div class="container">
            <h2 class="text-danger fw-bold">No #1 Platform</h2>
            <h3 class="fw-bold">Pernikahan Digital</h3>
            <p class="text-muted">Wedding Planner (soon) - Invitation - Digital Guestbook</p>
            <p>One stop solution your wedding buddy! <br> Solusi pernikahanmu jadi lebih modern, efisien dan terukur</p>
            <a href="{{route('user.login')}}" class="btn btn-danger btn-lg">Buat Sekarang Gratis!</a>
        </div>
    </section>

    <!-- Image Section -->
    <section class="container text-center my-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('asset_main/img/pernikahan2.jpg') }}" alt="Tablet Mockup" class="img-fluid">
            </div>
            <div class="col-md-6">
                <img src="{{ asset('asset_main/img/pernikahan3.png') }}" alt="Phone Mockup" class="img-fluid">
            </div>
        </div>
    </section>


    <style>
        /* Custom Styles */
        .nav-link {
            color: #343a40; /* Warna teks menu */
        }

        .nav-link:hover, .nav-link.active {
            color: #ff5e6c; /* Warna merah untuk hover dan aktif */
            text-decoration: underline; /* Garis bawah */
        }

        .btn-masuk {
            background-color: #ffb5c1;
            color: black;
            border-radius: 10px;
        }

        .btn-masuk:hover {
            background-color: #ff99a8;
        }

        .hero {
            background: url('hero-image.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            text-align: center;
        }

        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 50px;
            border-radius: 10px;
        }

        .section-title {
            margin-bottom: 40px;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
    </style>
</head>
<body>
   
   

    <!-- Footer -->
    <footer class="bg-light py-4">
        <div class="container text-center">
            <p class="mb-0">© 2024 Our Wedding. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>