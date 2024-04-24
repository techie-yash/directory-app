
<!DOCTYPE html>
<html lang="en">

<head>
@include('include.adminStyle')
</head>

<body>
<div class="content-wrapper">

  <!-- ======= Header ======= -->
  @if (!in_array(Route::currentRouteName(), ['userPanelLogin', 'userPanelRegister']))
    @include('include.user-panel-header')
  @endif
    <!-- End Header -->
  <!-- ======= Sidebar ======= -->
  @if (!in_array(Route::currentRouteName(), ['userPanelLogin', 'userPanelRegister']))
    @include('include.user-panel-sidebar')
  @endif
    <!-- End Sidebar-->

  <main id="main" class="main">
    <!-- End Page Title -->
    @yield('content')
  </main>
  </div>

  <!-- ======= Footer ======= -->
  @if (!in_array(Route::currentRouteName(), ['userPanelLogin', 'userPanelRegister']))
  <footer id="footer" class="footer">
  @include('include.user-panel-footer')
    </footer>
  @endif
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  @include('include.script')

</body>

</html>