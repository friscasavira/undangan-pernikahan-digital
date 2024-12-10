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
    @if($setting && $setting->background_music)
        <audio id="backgroundAudio" autoplay loop>
            <source src="{{ asset('storage/' . $setting->background_music) }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    @endif

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



    <!-- Carousel Start -->
    <div class="container-fluid carousel-header px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <!-- Carousel Indicators -->
            <ol class="carousel-indicators">
                @foreach($photosThree as $index => $photo)
                    <li data-bs-target="#carouselId" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            

            <!-- Carousel Items -->
            <div class="carousel-inner" role="listbox">

                <!-- Carousel -->
                <div class="carousel-inner">
                    @foreach($photosThree as $index => $photo)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $photo->photo_url) }}" class="img-fluid" alt="Photo for Wedding">
                        <div class="carousel-caption">
                            <div class="p-3 mx-auto animated zoomIn" style="max-width: 900px;">
                                <!-- Title -->
                                <div class="d-inline-block border-end-0 border-start-0 border-secondary p-2 mb-4" style="border-style: double;">
                                    <h4 class="text-white text-uppercase fw-bold mb-0" style="letter-spacing: 3px;">{{ $wedding->title }}</h4>
                                </div>
                                <!-- Groom and Bride -->
                                <h1 class="display-1 text-capitalize text-white mb-3">{{ $wedding->groom_name }} 
                                    <i class="fa fa-heart text-primary"></i> {{ $wedding->bride_name }}
                                </h1>
                                <!-- Wedding Date -->
                                <div class="d-inline-block border-end-0 border-start-0 border-secondary p-2 mb-5" style="border-style: double;">
                                    @php
                                        \Carbon\Carbon::setLocale('id');
                                        $weddingDate = \Carbon\Carbon::parse($wedding->wedding_date);
                                        $weddingDateFormatted = $weddingDate->translatedFormat('d F Y');
                                    @endphp
                                    <h4 class="text-white text-uppercase fw-bold mb-0" style="letter-spacing: 3px;">{{ $weddingDateFormatted }}</h4>
                                </div>
                                <!-- RSVP Button -->
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="btn btn-primary btn-primary-outline-0 py-3 px-5" id="audioButton{{ $photo->id_photo }}" href="#">
                                        <i class="fa fa-music me-2"></i> MUSIC
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const audio = document.getElementById('backgroundAudio');
                            if (audio) {
                                audio.play().catch(error => {
                                    console.error('Autoplay tidak diizinkan:', error);
                                });
                            }

                            // Tombol Play/Pause
                            document.getElementById('audioButton<?php echo $photo->id_photo ?>').addEventListener('click', function(event) {
                                event.preventDefault();
                                const audio = document.getElementById('backgroundAudio');
                                if (audio.paused) {
                                    audio.play();
                                } else {
                                    audio.pause();
                                }
                            });
                        });
                    </script>
                    @endforeach 
                </div>
            </div>
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

            <!-- Navigation Buttons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Hello! Start -->
    <div class="container-fluid position-relative py-5" id="weddingAbout">
        <div class="position-absolute" style="top: -35px; right: 0;">
            <img src="{{ asset('asset_main/img/tamp-bg-1.png') }}" class="img-fluid" alt="">
        </div>
        <div class="position-absolute" style="top: -10px; left: 0; transform: rotate(150deg);">
            <img src="{{ asset('asset_main/img/tamp-bg-1.png') }}" class="img-fluid" alt="">
        </div>
        <div class="container position-relative py-5">
            <div class="mx-auto text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800;">
                <h1 class="text-primary display-1">Hello!</h1>
                <h4 class="text-dark mb-0">Kami mengundang anda untuk merayakan pernikahan kami</h4>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="d-flex">
                                <div class="text-end my-auto pe-4">
                                    <h3 class="text-primary mb-3">{{ $wedding->bride_name }}</h3>
                                    <p class="text-dark mb-0" style="line-height: 30px;">{{ $wedding->message}}
                                    </p>
                                </div>
                                <img src="{{ asset('storage/' . $wedding->bride_photo) }}" class="img-fluid w-100 img-border" alt=""  style="height: 200px; object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-lg-2 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="fa fa-heart fa-5x text-primary"></i>
                            </div>
                        </div>
                        <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="d-flex">
                                <img src="{{ asset('storage/' . $wedding->groom_photo) }}" class="img-fluid w-100 img-border" alt=""  style="height: 200px; object-fit: cover;">
                                <div class="my-auto ps-4">
                                    <h3 class="text-primary mb-3">{{ $wedding->groom_name }}</h3>
                                    <p class="text-dark mb-0" style="line-height: 30px;">{{ $wedding->message}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hello! End -->


    <!-- About Start -->
    <!-- <div class="container-fluid position-relative overflow-hidden bg-secondary py-5">
        <img src="img/bg-flower.png" class="img-fluid position-absolute top-0" style="right: -15px; transform: rotate(270deg); opacity: 0.5;" alt="">
        <img src="img/bg-flower.png" class="img-fluid position-absolute" style="bottom: 10px; left: -15px; transform: rotate(90deg); opacity: 0.5;" alt="">
        <div class="container py-5 position-relative">
            <div class="row g-5 align-items-center">
                <div class="col-xl-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="border-white bg-primary" style="border-style: double;">
                        <img src="{{ asset('asset_main/img/about-1.jpg') }}" class="img-fluid w-100" alt="">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                        <h5 class="text-uppercase text-primary fw-bold mb-4">About Us</h5>
                        <h1 class="display-5 text-white mb-4">We Make Your Every Moment</h1>
                        <p class="text-white fs-5 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                        <div class="tab-class bg-primary p-4">
                            <ul class="nav d-flex mb-4">
                                <li class="nav-item">
                                    <a class="d-flex py-2 text-center bg-white active" data-bs-toggle="pill" href="#tab-1">
                                        <span class="text-dark" style="width: 150px;">Bride Info</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex py-2 mx-3 text-center bg-white" data-bs-toggle="pill" href="#tab-2">
                                        <span class="text-dark" style="width: 150px;">Groom info</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane fade show p-0 active">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex">
                                                <div class="me-4">
                                                    <img src="{{ asset('asset_main/img/bride.jpg') }}" class="img-fluid w-100 img-border" alt="">
                                                </div>
                                                <div class="text-start my-auto">
                                                    <h5 class="text-white fw-bold">{{ $wedding->groom_name }}</h5>
                                                    <p class="text-white mb-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                    </p>
                                                    <div class="d-flex">
                                                        <a href="" class="btn btn-primary btn-primary-outline-0 btn-sm-square me-2"><i class="fab fa-facebook-f"></i></a>
                                                        <a href="" class="btn btn-primary btn-primary-outline-0 btn-sm-square me-2"><i class="fab fa-twitter"></i></a>
                                                        <a href="" class="btn btn-primary btn-primary-outline-0 btn-sm-square me-2"><i class="fab fa-instagram"></i></a>
                                                        <a href="" class="btn btn-primary btn-primary-outline-0 btn-sm-square me-0"><i class="fab fa-linkedin-in"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane fade show p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex">
                                                <div class="me-4">
                                                    <img src="{{ asset('asset_main/img/Groom.jpg') }}" class="img-fluid w-100 img-border" alt="">
                                                </div>
                                                <div class="text-start my-auto">
                                                    <h5 class="text-white fw-bold">{{ $wedding->bride_name }}</h5>
                                                    <p class="text-white mb-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                    </p>
                                                    <div class="d-flex">
                                                        <a href="" class="btn btn-primary btn-primary-outline-0 btn-sm-square me-2"><i class="fab fa-facebook-f"></i></a>
                                                        <a href="" class="btn btn-primary btn-primary-outline-0 btn-sm-square me-2"><i class="fab fa-twitter"></i></a>
                                                        <a href="" class="btn btn-primary btn-primary-outline-0 btn-sm-square me-2"><i class="fab fa-instagram"></i></a>
                                                        <a href="" class="btn btn-primary btn-primary-outline-0 btn-sm-square me-0"><i class="fab fa-linkedin-in"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-5">
                            <div class="d-flex align-items-center justify-content-center flex-shrink-0">
                                <a href="#" class="btn btn-primary btn-primary-outline-0 py-3 px-4">Read More</a>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="d-inline-block ms-4 me-3">
                                    <i class="fa fa-phone fa-2x text-success border border-2 border-white p-2"></i>
                                </div>
                                <div class="d-flex flex-column flex-nowrap">
                                    <h5 class="text-dark fw-bold mb-2">Call Us Anytime</h5>
                                    <h4 class="text-primary mb-0">+123 456 7890</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- About End -->


    <!-- Story Start -->
    <div class="container-fluid story position-relative py-5" id="weddingStory">
        <div class="position-absolute" style="top: -35px; right: 0;">
            <img src="{{ asset('asset_main/img/tamp-bg-1.png') }}" class="img-fluid" alt="">
        </div>
        <div class="position-absolute" style="top: -15px; left: 0; transform: rotate(150deg);">
            <img src="{{ asset('asset_main/img/tamp-bg-1.png') }}" class="img-fluid" alt="">
        </div>
        <div class="container position-relative py-5">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="text-uppercase text-primary fw-bold mb-4">Story</h5>
                <h1 class="display-4">Our Love Story</h1>
            </div>
            <div class="story-timeline">
                @foreach ($love_storys as $index => $love_story)
                @php
                    \Carbon\Carbon::setLocale('id');
                    $love_storyDate = \Carbon\Carbon::parse($love_story->date_story);
                    $love_storyDateFormatted = $love_storyDate->translatedFormat('d F Y');
                @endphp
                @if($index % 2 == 0)
                <!-- Even index: Image on the left, Text on the right -->
                <div class="row wow fadeInUp" data-wow-delay="0.2s">
                    <div class="col-md-6 border-0 border-top border-end border-secondary p-4 text-end">
                        <div class="d-inline-flex align-items-center h-100">
                            <img src="{{ asset('storage/' . $love_story->photo_url) }}" class="img-fluid w-100 img-border" alt=""  style="height: 200px; object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-md-6 border-start border-top border-secondary p-4 pe-0">
                        <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                            <h4 class="mb-2 text-dark">{{ $love_story->tittle_story }}</h4>
                            <p class="text-uppercase text-primary mb-2" style="letter-spacing: 3px;">{{ $love_storyDateFormatted }}</p>
                            <p class="m-0 fs-5">{{ $love_story->description_story }}</p>
                        </div>
                    </div>
                </div>
                @else
                <!-- Odd index: Text on the left, Image on the right -->
                <div class="row wow fadeInUp" data-wow-delay="0.3s">
                    <div class="col-md-6 border-end border-top border-secondary p-4 ps-0">
                        <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                            <h4 class="text-dark mb-2">{{ $love_story->tittle_story }}</h4>
                            <p class="text-uppercase text-primary mb-2" style="letter-spacing: 3px;">{{ $love_storyDateFormatted }}</p>
                            <p class="m-0 fs-5">{{ $love_story->description_story }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 border-start border-top border-secondary p-4">
                        <div class="d-inline-flex align-items-center h-100">
                            <img src="{{ asset('storage/' . $love_story->photo_url) }}" class="img-fluid w-100 img-border" alt=""  style="height: 200px; object-fit: cover;">
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- Story End -->


    <!--- Wedding Date -->
    <div class="container-fluid wedding-date-bg position-relative py-5">
        <div class="position-absolute" style="top: -100px; right: 0;">
            <img src="img/tamp-bg-1.png" class="img-fluid" alt="">
        </div>
        <div class="position-absolute" style="top: -80px; left: 0; transform: rotate(150deg);">
            <img src="img/tamp-bg-1.png" class="img-fluid" alt="">
        </div>
        <div class="container py-5 wow zoomIn" data-wow-delay="0.1s">
            <div class="wedding-date text-center bg-light p-5" style="border-style: double !important; border: 15px solid rgba(253, 93, 93, 0.5);">
                <div class="wedding-date-content">
                    @php
                    \Carbon\Carbon::setLocale('id');
                    $weddingDate = \Carbon\Carbon::parse($wedding->wedding_date);
                    $weddingDateFormatted = $weddingDate->translatedFormat('d F Y');
                    @endphp
                    <div class="d-inline-block border-end-0 border-start-0 border-secondary p-2 mb-4" style="border-style: double;">
                        <h4 class="text-dark text-uppercase fw-bold mb-0" style="letter-spacing: 3px;">{{ $weddingDateFormatted }}</h4>
                    </div>
                    <h1 class="display-4">{{ $wedding->title }}</h1>
                    <p class="text-dark fs-5">{{ $wedding->location }}</p>
                    <div class="d-flex align-items-center justify-content-center mb-5">
                        <div class="text-dark fs-2 me-4">
                            <div id="days">00</div>
                            <span>Days</span>
                        </div>
                        <div class="text-dark fs-2 me-4">
                            <div id="hours">00</div>
                            <span>Hours</span>
                        </div>
                        <div class="text-dark fs-2 me-4">
                            <div id="minutes">00</div>
                            <span>Mins</span>
                        </div>
                        <div class="text-dark fs-2 me-0">
                            <div id="seconds">00</div>
                            <span>Secs</span>
                        </div>
                    </div>
                    <a class="btn btn-primary btn-primary-outline-0 py-3 px-5" href="#">Book Your Attendance</a>
                </div>
                <div class="position-absolute" style="top: 15%; right: -30px; transform: rotate(320deg); opacity: 0.5; z-index: 1;">
                    <img src="img/attendance-bg.png" class="img-fluid" alt="">
                </div>
                <div class="position-absolute" style="top: 15%; left: -10px; transform: rotate(-320deg); opacity: 0.5; z-index: 1;">
                    <img src="img/attendance-bg.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Wedding Date -->


    <!-- Wedding Timeline start -->
    <div class="container-fluid wedding-timeline bg-secondary position-relative overflow-hidden py-5" id="weddingTimeline">
        <div class="position-absolute" style="top: 50%; left: -100px; transform: translateY(-50%); opacity: 0.5;">
            <img src="img/wedding-bg.png" class="img-fluid" alt="">
        </div>
        <div class="position-absolute" style="top: 50%; right: -160px; transform: translateY(-50%); opacity: 0.5; rotate: 335deg;">
            <img src="img/wedding-bg.png" class="img-fluid" alt="">
        </div>
        <div class="container py-5">
            <div class="text-center mb-5">
                <h1 class="display-4 text-white">Wedding Planing Timeline</h1>
            </div>
            <div class="position-relative wedding-content">
                <div class="row g-4">

                @foreach ($events as $index => $event)
                @if($index % 2 == 0)
                    <div class="col-6 col-md-6 col-xl-3 border border-bottom-0">
                        <div class="text-center p-3 wow fadeIn" data-wow-delay="0.1s">
                            <div class="mb-4 p-3 d-inline-flex">
                                <i class="fas fa-menorah text-primary fa-3x"></i>
                            </div>
                            @php
                                \Carbon\Carbon::setLocale('id');
                                $eventDate = \Carbon\Carbon::parse($event->event_date);
                                $eventDateFormatted = $eventDate->translatedFormat('d F Y');
                            @endphp
                            <p class="text-dark">{{ $weddingDateFormatted }}</p>
                            <p class="text-primary">
                            {{ \Carbon\Carbon::parse($event->event_time)->format('h:i A') }}</p>
                            <p class="text-success">{{ $event->event_location}}</p>
                            <h3 class="text-dark">{{ $event->event_name}}</h3>
                            <p class="text-dark">{{ $event->event_description}}</p>
                        </div>  
                    </div>
                    @else
                    <div class="col-6 col-md-6 col-xl-3 border border-top-0 border-start-0">
                        <div class="text-center p-3 wow fadeIn" data-wow-delay="0.3s">
                            <div class="mb-4 p-3 d-inline-flex">
                                <i class="fas fa-photo-video text-primary fa-3x"></i>
                            </div>
                            @php
                                \Carbon\Carbon::setLocale('id');
                                $Date = \Carbon\Carbon::parse($event->event_date);
                                $eventDateFormatted = $eventDate->translatedFormat('d F Y');
                            @endphp
                            <p class="text-dark">{{ $weddingDateFormatted }}</p>
                            <p class="text-primary">
                            {{ \Carbon\Carbon::parse($event->event_time)->format('h:i A') }}</p>
                            <p class="text-success">{{ $event->event_location}}</p>
                            <h3 class="text-dark">{{ $event->event_name}}</h3>
                            <p class="text-dark">{{ $event->event_description}}</p>
                        </div>
                    </div>
                    @endif
                @endforeach
                </div>
                <div class="position-absolute heart-circle " style="bottom: 0; left: -18px;">
                    <div class="border border-2 border-primary rounded-circle p-1 bg-secondary"></div>
                </div>
                <div class="position-absolute heart-circle" style="top: 18px; right: -17px;">
                    <div class="border border-2 border-primary rounded-circle p-1 bg-secondary"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wedding Timeline End -->


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
               
                <div class="col-12 text-center wow fadeIn" data-wow-delay="0.2s">
                    <a class="btn btn-primary btn-primary-outline-0 py-3 px-5 me-2" href="{{ route('home.photo', $unique_url) }}">View All <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery end -->



    <!-- RSVP Form Start -->
    <div class="container-fluid RSVP-form py-5" id="weddingRsvp">
    <div class="container py-5">
        <div class="mb-5 text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="display-2 text-primary">RSVP Form</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="p-5 border-secondary position-relative" style="border-style: double;">
                    <div class="fw-bold text-primary bg-white d-flex align-items-center justify-content-center position-absolute border-secondary p-2 wow fadeIn" data-wow-delay="0.1s" style="width: 75%; border-style: double; top: 0; left: 50%; transform: translate(-50%, -50%);">
                        Harap tanggapi sebelum {{ $weddingDateFormatted }}, Kami menantikan untuk merayakan bersama Anda!
                    </div>
                    <form method="POST" action="{{ route('home.rsvp') }}">
                        @csrf
                        <div class="row gx-4 gy-3">
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="form-group">
                                    <label for="name" class="form-label text-dark">Name</label>
                                    <input type="text" name="name" class="form-control py-3 border-0" id="name" placeholder="Name"style="color: black;">
                                    <div class="text-danger">
                                        @error('name')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="form-group">
                                    <label for="email" class="form-label text-dark">Email</label>
                                    <input type="email" name="email" class="form-control py-3 border-0" id="email" placeholder="Email" style="color: black;">
                                    <div class="text-danger">
                                        @error('email')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="form-group">
                                    <label for="phone" class="form-label text-dark">Phone</label>
                                    <input type="text" name="phone" class="form-control py-3 border-0" id="phone" placeholder="Phone" style="color: black;">
                                    <div class="text-danger">
                                        @error('phone')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="form-group">
                                    <label for="total_guests" class="form-label text-dark">Total Guests</label>
                                    <input type="number" name="total_guests" class="form-control py-3 border-0" id="total_guests" placeholder="Total Guests" style="color: black;">
                                    <div class="text-danger">
                                        @error('total_guests')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                <div class="form-group">
                                    <label for="message" class="form-label text-dark">Message</label>
                                    <textarea name="message" class="form-control border-0" id="message" cols="30" rows="5" placeholder="Message" style="color: black;"></textarea>
                                    <div class="text-danger">
                                        @error('message')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="form-group">
                                    <label for="is_invited" class="form-label text-dark">Is Invited</label>
                                    <select name="is_invited" class="form-select py-3 border-0" id="is_invited" style="color: black;">
                                        <option value="" disabled selected>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                    <div class="text-danger">
                                        @error('is_invited')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="form-group">
                                    <label for="attendance_status" class="form-label text-dark">Attendance Status</label>
                                    <select name="attendance_status" class="form-select py-3 border-0" id="attendance_status" style="color: black;">
                                        <option value="" disabled selected>-- Pilih --</option>
                                        <option value="Belum Konfirmasi">Belum Konfirmasi</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Tidak Hadir">Tidak Hadir</option>
                                    </select>
                                    <div class="text-danger">
                                        @error('attendance_status')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center wow fadeIn" data-wow-delay="0.1s">
                                <button class="btn btn-primary btn-primary-outline-0 py-3 px-5" type="submit">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- RSVP Form End -->



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

    <script>
        // Ambil tanggal pernikahan dari PHP ke JavaScript
        const weddingDate = new Date("{{ $weddingDate->format('Y-m-d H:i:s') }}").getTime();

        // Fungsi hitungan mundur
        const countdownFunction = setInterval(() => {
            const now = new Date().getTime();
            const distance = weddingDate - now;

            // Hitung hari, jam, menit, dan detik
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Tampilkan hasil
            document.getElementById("days").textContent = days;
            document.getElementById("hours").textContent = hours;
            document.getElementById("minutes").textContent = minutes;
            document.getElementById("seconds").textContent = seconds;

            // Jika waktu habis, hentikan hitungan mundur
            if (distance < 0) {
                clearInterval(countdownFunction);
                document.getElementById("days").textContent = "00";
                document.getElementById("hours").textContent = "00";
                document.getElementById("minutes").textContent = "00";
                document.getElementById("seconds").textContent = "00";
            }
        }, 1000);
    </script>
    @if (session('success'))
        <script type="text/javascript">
            // Menampilkan pesan sukses menggunakan alert
            alert("{{ session('success') }}");
        </script>
    @endif
</body>

</html>