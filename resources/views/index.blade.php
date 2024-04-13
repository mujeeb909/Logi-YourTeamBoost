<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>YourTeamBoost - Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>192 S. Hillview Dr, Milpitas, CA 95035</small>

            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                IG-@yourteamboost
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="{{ route('home') }}" class="navbar-brand ms-4 ms-lg-0">

                <img height="97" width="200" src="img/ytb_logo.png" alt="">
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                    <!--<a href="{{ route('donate') }}" class="nav-item nav-link">Donate</a>-->
                    <!--<a href="" class="nav-item nav-link">Causes</a>-->

                    <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Account</a>
                        <div class="dropdown-menu m-0">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ route('admin/home') }}" class="dropdown-item">Dashboard</a>
                                    <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                                @else
                                    <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('coach-register') }}" class="dropdown-item">Sign Up</a>
                                    @endif
                                @endauth
                            @endif


                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn btn-outline-primary py-2 px-3" href="{{ route('coach-register') }}">
                        Get Started
                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <!--    <div class="container-fluid p-0 mb-5">-->
    <!--        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">-->
    <!--            <div class="carousel-inner">-->
    <!--                <div class="carousel-item active">-->
    <!--                    <img class="w-100" src="img/carousal.png" alt="Image">-->
    <!--                    <div class="carousel-caption">-->
    <!--                        <div class="container">-->
    <!--                            <div class="row justify-content-center">-->
    <!--                                <div class="col-lg-7 pt-5">-->
    <!--                                    <h1 class="display-4 text-white mb-3 animated slideInDown">Raise more, stress less.</h1>-->
    <!--                                    <p class="fs-5 text-white-50 mb-5 animated slideInDown">Experience the power of effortless fundraising, where you can raise-->
    <!--more and stress less. Our innovative approach takes the hassle out of-->
    <!--raising funds, allowing you to achieve greater results with ease.</p>-->
    <!--                                    <a class="btn btn-primary py-2 px-3 animated slideInDown" href="{{ route('coach-register') }}">-->
    <!--                                      Register Now-->
    <!--                                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">-->
    <!--                                            <i class="fa fa-arrow-right"></i>-->
    <!--                                        </div>-->
    <!--                                    </a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->

    <!--            </div>-->
    <!--            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"-->
    <!--                data-bs-slide="prev">-->
    <!--                <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
    <!--                <span class="visually-hidden">Previous</span>-->
    <!--            </button>-->
    <!--            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"-->
    <!--                data-bs-slide="next">-->
    <!--                <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
    <!--                <span class="visually-hidden">Next</span>-->
    <!--            </button>-->
    <!--        </div>-->
    <!--    </div>-->

    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner custom-height">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousal.png" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center align-items-center">
                                <!-- Center align and vertically center the content -->
                                <div class="col-lg-7 text-center text-lg-start custom-test">
                                    <!-- Center align text and start alignment on lg screens -->
                                    <h1 class="display-4 text-white mb-3 animated slideInDown">Raise more, stress less.
                                    </h1>
                                    <p class="fs-5 text-white-50 mb-5 animated slideInDown">Experience the power of
                                        effortless fundraising, where you can raise more and stress less. Our innovative
                                        approach takes the hassle out of raising funds, allowing you to achieve greater
                                        results with ease.</p>
                                    <a class="btn btn-primary py-2 px-3 animated slideInDown"
                                        href="{{ route('coach-register') }}">
                                        Register Now
                                        <div
                                            class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add more carousel items here if needed -->
            </div>
            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button> --}}
        </div>
    </div>


    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100 pt-5 pe-5" src="img/ytb_image_1.jpeg"
                            alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">About Us
                        </div>
                        <h1 class="display-6 mb-5">We help organizations from team
                            sports to nonprofits and businesses</h1>
                        <div class="bg-light border-bottom border-5 border-primary rounded p-4 mb-4">
                            <p class="text-dark mb-2">Your Team Boost is dedicated to empowering schools and
                                organizations to reach their financial goals with innovative strategies and
                                unwavering support. 
                                At Your Team Boost, we go beyond by offering a fully
                                customized web store that allows participants to make
                                purchases for branded merchandise. This unique feature
                                ensures that the swag aligns with their current brand.
                                Moreover, we believe in rewarding every child and coach
                                who registers for the fundraiser with a complimentary t-shirt,
                                which they can design themselves. In addition to
                                merchandise sales, we also provide a convenient online
                                donation platform to accept direct financial contributions.
                            </p>

                        </div>
                        <span class="text-primary">
                            <div class="testimonial-item" style="display: flex;">
                                <div style="display: flex; align-items: left;">
                                    <img class="img-fluid bg-light border-orange rounded-circle border-orange p-2 mx-auto mb-4" src="img/christine_pic.jpg" style="width: 100px; height: 100px;">
                                </div>
                                <div style="display: flex; flex-direction: column; margin-top: 58px;  margin-left: -65px;">
                                    <p style="margin-top: -42px;margin-left:102px;text-align: left;">Christine Richardson, Founder</p> 
                                    <img class="img-fluid bg-light p-2 mx-auto mb-4" style="width: 113px; height: 71px;" src="img/YTB_SIG_LOGO.png">
                                </div>
                            </div>
                            
                            
                        </span>

                        

                       
                    </div>
                   
                    <a class="btn btn-outline-primary py-2 px-3" href="{{ route('contact') }}">
                        Contact Us
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- About End -->


    <!-- Causes Start -->
    <div class="container-xxl bg-light my-5 py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Feature Causes</div>
                <h1 class="display-6 mb-5">Imagine Your Team Boost Fundraiser</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div
                        class="causes-item d-flex flex-column bg-white border-top border-5 border-primary rounded-top overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                                <small>Basketball fundraiser</small>
                            </div>
                            <h5 class="mb-3">Basketball Fundraiser</h5>
                            {{-- <p>Tempor erat elitr rebum at clita dolor diam ipsum sit diam amet diam et eos</p> --}}
                            <div class="causes-progress bg-light p-3 pt-2">
                                <div class="d-flex justify-content-between">
                                    <p class="text-dark">$10,000 <small class="text-body">Goal</small></p>
                                    <p class="text-dark">$9,542 <small class="text-body">Raised</small></p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="95"
                                        aria-valuemin="0" aria-valuemax="100">
                                        <span>95%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="img/ytb_image_2.png" alt="" />
                            <div class="causes-overlay">
                                <!--<a class="btn btn-outline-primary" href="">-->
                                <!--    Read More-->
                                <!--    <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">-->
                                <!--        <i class="fa fa-arrow-right"></i>-->
                                <!--    </div>-->
                                <!--</a>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div
                        class="causes-item d-flex flex-column bg-white border-top border-5 border-primary rounded-top overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                                <small>Dance Studio Fundraiser</small>
                            </div>
                            <h5 class="mb-3">Dance Studio Fundraiser</h5>
                            {{-- <p>Tempor erat elitr rebum at clita dolor diam ipsum sit diam amet diam et eos</p> --}}
                            <div class="causes-progress bg-light p-3 pt-2">
                                <div class="d-flex justify-content-between">
                                    <p class="text-dark">$10,000 <small class="text-body">Goal</small></p>
                                    <p class="text-dark">$9,763 <small class="text-body">Raised</small></p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="97"
                                        aria-valuemin="0" aria-valuemax="100">
                                        <span>97%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="img/ytb_image_3.png" alt="">
                            <div class="causes-overlay">
                                <!--<a class="btn btn-outline-primary" href="">-->
                                <!--    Read More-->
                                <!--    <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">-->
                                <!--        <i class="fa fa-arrow-right"></i>-->
                                <!--    </div>-->
                                <!--</a>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div
                        class="causes-item d-flex flex-column bg-white border-top border-5 border-primary rounded-top overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                                <small>Local Business Fundraiser</small>
                            </div>
                            <h5 class="mb-3">Local Business Fundraiser</h5>
                            {{-- <p>Tempor erat elitr rebum at clita dolor diam ipsum sit diam amet diam et eos</p> --}}
                            <div class="causes-progress bg-light p-3 pt-2">
                                <div class="d-flex justify-content-between">
                                    <p class="text-dark">$10,000 <small class="text-body">Goal</small></p>
                                    <p class="text-dark">$9,212 <small class="text-body">Raised</small></p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="92"
                                        aria-valuemin="0" aria-valuemax="100">
                                        <span>92%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="img/ytb_image_4.png" alt="">
                            <div class="causes-overlay">
                                <!--<a class="btn btn-outline-primary" href="">-->
                                <!--    Read More-->
                                <!--    <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">-->
                                <!--        <i class="fa fa-arrow-right"></i>-->
                                <!--    </div>-->
                                <!--</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Causes End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">What We Do</div>
                <h1 class="display-6 mb-5">How it works</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/laucnh.svg" alt="">
                        <h4 class="mb-3">Coach and Player Sign up</h4>
                        <p class="mb-4">Upon successful creation of your team's
                            fundraising page, our fundraising
                            program manager will be present on-site
                            to assist in launching the campaign. </p>
                        <!--<a class="btn btn-outline-primary px-3" href="">-->
                        <!--    Learn More-->
                        <!--    <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">-->
                        <!--        <i class="fa fa-arrow-right"></i>-->
                        <!--    </div>-->
                        <!--</a>-->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/monitor.svg" alt="">
                        <h4 class="mb-3">Track Engagement</h4>
                        <p class="mb-4">Track your progress and participation
                            with Your Team Boost's user-friendly
                            admin dashboard.</p>
                        <!--<a class="btn btn-outline-primary px-3" href="">-->
                        <!--    Learn More-->
                        <!--    <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">-->
                        <!--        <i class="fa fa-arrow-right"></i>-->
                        <!--    </div>-->
                        <!--</a>-->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/expidotr.svg" alt="">
                        <h4 class="mb-3">Fund Transferring</h4>
                        <p class="mb-4">Choose your preferred method of
                            payment, whether it's a celebratory
                            check or the convenience of direct
                            deposit, ensuring your funds are in
                            your hands quicker than ever before..</p>
                        <!--<a class="btn btn-outline-primary px-3" href="">-->
                        <!--    Learn More-->
                        <!--    <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">-->
                        <!--        <i class="fa fa-arrow-right"></i>-->
                        <!--    </div>-->
                        <!--</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Donate Start
    <div class="container-fluid donate my-5 py-5" data-parallax="scroll" data-image-src="img/carousal.png">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Donate Now</div>
                    <h1 class="display-6 text-white mb-5">Thanks For The Results Achieved With You</h1>
                    <p class="text-white-50 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 bg-white p-5">
                        {{-- <form action="/session" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control bg-light border-0" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control bg-light border-0" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn-group d-flex justify-content-around">
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked>
                                        <label class="btn btn-light py-3" name="amount" value="10" for="btnradio1">$10</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2">
                                        <label class="btn btn-light py-3"  name="amount" value="20" for="btnradio2">$20</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3">
                                        <label class="btn btn-light py-3" name="amount" value="30" for="btnradio3">$30</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-5" style="height: 60px;">
                                        Donate Now
                                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </form> --}}
                        <form action="/session" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control bg-light border-0" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control bg-light border-0" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn-group d-flex justify-content-around">
                                        <input type="radio" class="btn-check" name="amount" id="btnradio1" value="10" checked>
                                        <label class="btn btn-light py-3" for="btnradio1">$10</label>
                        
                                        <input type="radio" class="btn-check" name="amount" id="btnradio2" value="20">
                                        <label class="btn btn-light py-3" for="btnradio2">$20</label>
                        
                                        <input type="radio" class="btn-check" name="amount" id="btnradio3" value="30">
                                        <label class="btn btn-light py-3" for="btnradio3">$30</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-5" style="height: 60px;">
                                        Donate Now
                                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    Donate End -->


    <!-- Team Start -->
    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Team Members</div>
                <h1 class="display-6 mb-5">Let's Meet With Our Ordinary Soldiers</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-1.jpg" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Full Name</h5>
                            <p class="text-primary">Designation</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-2.jpg" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Full Name</h5>
                            <p class="text-primary">Designation</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-3.jpg" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Full Name</h5>
                            <p class="text-primary">Designation</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-4.jpg" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Full Name</h5>
                            <p class="text-primary">Designation</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Team End -->


    <!--Testimonial Start -->
    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Testimonial</div>
                <h1 class="display-6 mb-5">Trusted By Thousands Of People And Nonprofits</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="img/christine_pic.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                        <h5 class="mb-1">Doner Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="img/testimonial-2.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                        <h5 class="mb-1">Doner Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="img/testimonial-3.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                        <h5 class="mb-1">Doner Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
     {{-- Testimonial End  --}}


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <img height="97" width="200" src="img/ytb_logo.png" alt=""><br>
                    <p class="pt-2">At Your Team Boost, we specialize in providing an
                        easy solution to a diverse range of organizations, including team sports,
                        nonprofits, and businesses, leveraging our expertise to support their
                        financial objectives and cause.</p>
                    <div class="d-flex pt-2">

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>192 S. Hillview Dr, Milpitas, CA 95035</p>
                    <p><i class="fa fa-phone-alt me-3"></i>(408) - 262 - 7727</p>
                    <p><i class="fa fa-envelope me-3"></i>info.ytb@gmail.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="{{ route('contact') }}">Contact Us</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    {{-- <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p> --}}
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">YourTeamBoost</a>, All Right Reserved.
                    </div>
                    {{-- <div class="col-md-6 text-center text-md-end">
                      <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                      Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                  </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
