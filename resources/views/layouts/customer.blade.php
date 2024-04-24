
<!DOCTYPE html>
<html lang="en">

<head>
@include('include.adminStyle')
</head>

<body>
<div class="content-wrapper">

  <!-- ======= Header ======= -->
  @if (!in_array(Route::currentRouteName(), ['customer.login', 'customer.register']))
    @include('include.customerHeader')
  @endif
    <!-- End Header -->
  <!-- ======= Sidebar ======= -->
  @if (!in_array(Route::currentRouteName(), ['customer.login', 'customer.register']))
    @include('include.customerSidebar')
  @endif
    <!-- End Sidebar-->

  <main id="main" class="main">
    <!-- End Page Title -->
    @yield('content')
  </main>
  </div>

  <!-- ======= Footer ======= -->
  @if (!in_array(Route::currentRouteName(), ['customer.login', 'customer.register']))
  <footer id="footer" class="footer">
  @include('include.customerPanelFooter')
    </footer>
  @endif
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  @include('include.script')

</body>

</html>