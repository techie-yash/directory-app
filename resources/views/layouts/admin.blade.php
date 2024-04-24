
<!DOCTYPE html>
<html lang="en">

<head>
@include('include.adminStyle')
</head>

<body>
<div class="content-wrapper">

  <!-- ======= Header ======= -->
  @include('include.header')
  <!-- End Header -->
  <!-- ======= Sidebar ======= -->
   @include('include.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">
    <!-- End Page Title -->
    @yield('content')
  </main>
  </div>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
  @include('include.footer')
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  @include('include.script')

</body>

</html>