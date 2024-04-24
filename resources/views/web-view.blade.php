<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OnePage Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('assets/webpage/img/favicon.png')}}" rel="icon">
  <link href="{{url('assets/webpage/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('assets/webpage/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{url('assets/webpage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/webpage/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('assets/webpage/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/webpage/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/webpage/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{url('assets/webpage/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- Template Main CSS File -->
  <link href="{{url('assets/webpage/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: OnePage
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <title>Restaurant Section</title>
  <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .main-section {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        .restaurant-list {
            flex: 2;
        }

        .restaurant-card {
            /* border: 1px solid #ccc; */
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            background-color: #f8fbfe;
            border: none; 
        }

        .advertisement {
            flex: 1;
            margin-top: 20px; /* Adjust margin as needed */
        }

        .filter-section {
            width: 20%;
            margin-top: 20px;
        }

        .filter-checkbox {
            margin-bottom: 10px;
        }

        .filter-button {
          padding: 10px;
          background-color: #007bff;
          color: white;
          border: none;
          border-radius: 5px;
          cursor: pointer;
        }

        .restauranth3{
          background-color: #f8fbfe;
          border: none; 
        }
    </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Our Project</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto o" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
          <li><a class="getstarted scrollto" href="{{ route('userPanelLogin') }}">Login</a></li>
          <li><a class="getstarted scrollto" href="{{ route('userPanelRegister') }}">Register</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->


<div class="container">
    <div class="restaurant-card restauranth3">
        <!-- Advertisements -->
        <div>
            <h3>Restaurants</h3>
            <!-- Add advertisement content here -->
        </div>
    </div>
    <div class="main-section">
      <div class="filter-section">
          <!-- Filters -->
          <h3>Filters</h3>
          <div class="filter-checkbox">
              <label><input type="checkbox"> Nearby</label>
          </div>
          <div class="filter-checkbox">
              <label><input type="checkbox"> Cities</label>
          </div>
          <h5>Sub-Categories</h5>
          <div class="filter-checkbox">
              <label><input type="checkbox"> Indian</label>
          </div>
          <div class="filter-checkbox">
              <label><input type="checkbox"> Asian</label>
          </div>
          <h5>Offers</h5>
          <div class="filter-checkbox">
              <label><input type="checkbox"> Buy 1 Get 1 free</label>
          </div>
          <div class="filter-checkbox">
              <label><input type="checkbox"> Percentage off</label>
          </div>
          <h5>Features</h5>
          <div class="filter-checkbox">
              <label><input type="checkbox"> Kids area</label>
          </div>
          <div class="filter-checkbox">
              <label><input type="checkbox"> Smoking</label>
          </div>
          <button class="btn btn-primary filter-button">Search</button>
          <button class="btn btn-secondary filter-button">Clear Filters</button>
      </div>
        <div class="restaurant-list">
            <!-- Restaurant Cards -->
            @foreach($business as $list)
            <div class="restaurant-card">
                <h3>Almashri Restaurant</h3>
                <p>212 King Faisal Street, Jeddah</p>
                <p>Category: Restaurant</p>
                <p>Keywords: Gulf, Egyptian, fish</p>
                <p>Distance: 1 Km</p>
                <p>Status: Open</p>
                <!-- Add more details as needed -->
                <div>
                    <button class="btn btn-primary">Call us</button>
                    <button class="btn btn-primary">Message</button>
                    <button class="btn btn-primary">Website</button>
                    <button class="btn btn-primary">Directions</button>
                    <button class="btn btn-primary">WhatsApp</button>
                </div>
            </div>
            @endforeach
            <!-- Add more restaurant cards here -->
            <div class="restaurant-card">
                <!-- Advertisements -->
                <div class="text-center">
                    <h3>Advertisement</h3>
                    <!-- Add advertisement content here -->
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>OnePage</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Comming Soon</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Comming Soon</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Comming Soon</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Comming Soon</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Comming Soon</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>OurProject</span></strong>. All Rights Reserved
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('assets/webpage/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{url('assets/webpage/vendor/aos/aos.js')}}"></script>
  <script src="{{url('assets/webpage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('assets/webpage/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{url('assets/webpage/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{url('assets/webpage/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{url('assets/webpage/vendor/php-email-form/validate.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- Template Main JS File -->
  <script src="{{url('assets/webpage/js/main.js')}}"></script>

</body>

</html>