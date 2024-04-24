<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboardUserPanel') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
    
      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('updateUserdetail')}}">
          <i class="bi bi-person"></i>
          <span>Account Setting </span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>My reviews</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-file-person"></i>
          <span>Favourites</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('branchList')}}">
          <i class="bi bi-envelope"></i>
          <span>Messages</span>
        </a>
      </li>
      <!-- End Register Page Nav -->
     
      <!-- End Login Page Nav -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Pro Features </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('videoList')}}">
              <i class="bi bi-circle"></i><span>Add Video</span>
            </a>
          </li>
          <li>
            <a href="{{ route('delievryNetworkList')}}">
              <i class="bi bi-circle"></i><span>Delivery Network</span>
            </a>
          </li>
          <li>
            <a href="{{ route('ourPartnerlist')}}">
              <i class="bi bi-circle"></i><span>Our Patners</span>
            </a>
          </li>
          <li>
            <a href="{{ route('offerList')}}">
              <i class="bi bi-circle"></i><span>Offers</span>
            </a>
          </li>
          <li>
            <a href="{{ route('bulletinlist')}}">
              <i class="bi bi-circle"></i><span>Bulletin</span>
            </a>
          </li>
          <li>
            <a href="{{ route('magzinelist')}}">
              <i class="bi bi-circle"></i><span>Magazine</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Forms</span>
            </a>
          </li>
          <li>
            <a href="{{ route('addCategory')}}">
              <i class="bi bi-circle"></i><span>Products/Services</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Rate/Reviews</span>
            </a>
          </li>
          <li>
            <a href="{{ route('postList')}}">
              <i class="bi bi-circle"></i><span>Posts</span>
            </a>
          </li>
          <li>
            <a href="components-pagination.html">
              <i class="bi bi-circle"></i><span>Messages</span>
            </a>
          </li>
          <li>
            <a href="{{ route('eventList')}}">
              <i class="bi bi-circle"></i><span>Events</span>
            </a>
          </li>
        </ul>
      </li> -->
    </ul>
  </aside>