<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

    
      <!-- End Components Nav -->
      <li class="nav-heading">User</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('profile.show') }}">
          <i class="bi bi-person"></i>
          <span>Edit Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('user')}}">
          <i class="bi bi-file-person"></i>
          <span>Add Users</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Registered Business</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('businessCategoryList')}}">
          <i class="bi bi-card-list"></i>
          <span>Category</span>
        </a>
      </li>
      <!-- End Register Page Nav -->
      <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('contact')}}">
        <i class="bi bi-envelope"></i>
          <span>Contact Us Page</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('faq.index')}}">
        <i class="bi bi-info-circle-fill"></i>
          <span>
            FAQ Page
          </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('about.index')}}">
        <i class="bi bi-person-circle"></i>
          <span>About Us Page</span>
        </a>
      </li>
      <li class="nav-heading">Misc</li>
      <!-- End Login Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Store Definitions </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('role')}}">
              <i class="bi bi-circle"></i><span>Define Role</span>
            </a>
          </li>
          <li>
            <a href="{{ route('offers')}}">
              <i class="bi bi-circle"></i><span>Define Offer</span>
            </a>
          </li>
          <li>
            <a href="{{ route('interests')}}">
              <i class="bi bi-circle"></i><span>Define User Interest</span>
            </a>
          </li>
          <li>
            <a href="{{ route('form')}}">
              <i class="bi bi-circle"></i><span>Define Form Type</span>
            </a>
          </li>
          <li>
            <a href="{{ route('events')}}">
              <i class="bi bi-circle"></i><span>Define Event Type</span>
            </a>
          </li>
          <li>
            <a href="{{ route('addFeatures')}}">
              <i class="bi bi-circle"></i><span>Define Features</span>
            </a>
          </li>
          <li>
            <a href="{{ route('cityList')}}">
              <i class="bi bi-circle"></i><span>Define Top Cities</span>
            </a>
          </li>
          <li>
            <a href="{{ route('locationList')}}">
              <i class="bi bi-circle"></i><span>Define Cities And locations</span>
            </a>
          </li>
          <li>
            <a href="components-modal.html">
              <i class="bi bi-circle"></i><span>Define Products/Services</span>
            </a>
          </li>
          <li>
            <a href="{{ route('currency')}}">
              <i class="bi bi-circle"></i><span>Define Top Currency</span>
            </a>
          </li>
          <li>
            <a href="components-pagination.html">
              <i class="bi bi-circle"></i><span>Show/Home Page Boxes</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>