<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>YourTeamBoost - OOPS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
              {{-- <h1 class="fw-bold text-primary m-0">YourTeam<span class="text-white">Boost</span></h1> --}}
              <img  height="97" width="200" src="{{ asset('img/ytb_logo.png') }}" alt="">
          </a>
          <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
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
                      @if(Route::has('login'))
                      @auth
                      <a href="{{ route('admin/home') }}" class="dropdown-item">Dashboard</a>
                      <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                      @else
                        <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                        @if(Route::has('register'))
                        <a href="{{ route('register') }}" class="dropdown-item">Sign Up</a>
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



    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Link Expired</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- 404 Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1">404</h1>
                    <h1 class="mb-4">Donation Link is Expired</h1>
                    <p class="mb-4">We apologize for the inconvenience, but it seems that the donation link you were trying to access has expired.</p>
                    <a class="btn btn-outline-primary py-2 px-3" href="{{ route('home') }}">
                        Go Back To Home
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->
 
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                  <img  height="97" width="200" src="{{ asset('img/ytb_logo.png') }}" alt=""><br>
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
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
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
      
      <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
      <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
      <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
      <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('lib/parallax/parallax.min.js') }}"></script>
      
    
  
      <!-- Template Javascript -->
      <script src="{{ asset('js/main.js') }}"></script>
      
  </body>
  
  </html>