<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Undangan Digital</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Open+Sans:wght@400;500;600&family=Petit+Formal+Script&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('asset_main/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_main/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('asset_main/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('asset_main/css/style.css')}}" rel="stylesheet">
</head>

<body data-bs-spy="scroll" data-bs-target="#navBar" id="weddingHome">

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid sticky-top px-0">
        <div class="container-fluid">
            <div class="container px-0">
                <nav class="navbar navbar-light navbar-expand-xl" id="navBar">
                    <a href="index.html" class="navbar-brand">
                        <h4 class="text-primary display-6 fw-bold mb-0">Mr<strong class="text-secondary">&</strong>Mrs</h4>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse py-3" id="navbarCollapse">
                        <div class="navbar-nav mx-auto border-top">
                            <a href="#weddingHome" class="nav-item nav-link active">Home</a>
                            <a href="#weddingAbout" class="nav-item nav-link">About</a>
                            <a href="#weddingStory" class="nav-item nav-link">Story</a>
                            <a href="#weddingTimeline" class="nav-item nav-link">Timeline</a>
                            <a href="#weddingGallery" class="nav-item nav-link">Gallery</a>
                            <a href="#weddingRsvp" class="nav-item nav-link">RSVP</a>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap pt-xl-0">
                            <a href="#weddingRsvp" class="btn btn-primary btn-primary-outline-0 py-2 px-4 ms-4">Book Attendance</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Gallery Start -->
    <div class="container-fluid gallery position-relative py-5" id="weddingGallery">
        <div class="position-absolute" style="top: -95px; right: 0;">
            <img src="{{ asset('asset_main/img/tamp-bg-1.png') }}" class="img-fluid" alt="">
        </div>
        <div class="position-absolute" style="top: -80px; left: 0; transform: rotate(150deg);">
            <img src="{{ asset('asset_main/img/tamp-bg-1.png') }}" class="img-fluid" alt="">
        </div>
        <div class="container position-relative py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-2 text-dark">Wedding Gallery</h1>
            </div>
           
            <div class="row g-4">
                @foreach($photos as $photo)
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="gallery-item">
                        <div class="gallery-img">
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $photo->photo_url) }}" alt="" style="height: 300px; object-fit: cover;">
                            <div class="hover-style"></div>
                            <div class="search-icon">
                                <a href="{{ asset('storage/' . $photo->photo_url) }}" data-lightbox="Gallery-1" class="my-auto"><i class="fas fa-plus btn-primary btn-primary-outline-0 p-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Gallery end -->


    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5 justify-content-center">
                <div class="col-lg-4 text-start">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-white">Links</h4>
                        <a href="#" class="btn-link"> About</a>
                        <a href="#" class="btn-link"> Gallery</a>
                        <a href="#" class="btn-link"> Story</a>
                        <a href="#" class="btn-link"> Timeline</a>
                        <a href="#" class="btn-link"> RSVP</a>
                        <a href="#" class="btn-link"> Contact Us</a>
                        <a href="#" class="btn-link"> Wsedding-date</a>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="footer-item">
                        <h4 class="mb-4 text-white">Mr<strong class="text-primary">&</strong>Mrs</h4>
                        <p class="text-white">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in tempor dui, non consectetur enim.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                        </p>
                        <div class="btn-link d-flex justify-content-center">
                            <a href="#" class="btn btn-md-square btn-light btn-light-outline-0 me-2"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-md-square btn-light btn-light-outline-0 me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-md-square btn-light btn-light-outline-0 me-2"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-md-square btn-light btn-light-outline-0 me-0"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-end">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-white">Follow Us</h4>
                        <a href="#" class="btn-link"> Faceboock</a>
                        <a href="#" class="btn-link"> Instagram</a>
                        <a href="#" class="btn-link"> Twitter</a>
                        <h4 class="my-4 text-white">Contact Us</h4>
                        <a href="#" class="btn-link"><i class="fas fa-envelope text-secondary me-2"></i> info@example.com</a>
                        <a href="#" class="btn-link"><i class="fas fa-phone text-secondary me-2"></i> (+012) 3456 7890 123</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->




    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start mb-md-0">
                    <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                </div>
                <div class="col-md-6 text-center text-md-end text-white">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('asset_main/lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('asset_main/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('asset_main/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('asset_main/lib/lightbox/js/lightbox.min.js')}}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('asset_main/js/main.js')}}"></script>

</body>

</html>