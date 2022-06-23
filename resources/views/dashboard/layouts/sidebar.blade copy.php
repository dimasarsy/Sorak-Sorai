    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        
        <ul class="nav flex-column">
          <!-- <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} " aria-current="page" href="/dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
         -->

          <!-- <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
              <span data-feather="shopping-bag"></span>
              Product
            </a>
          </li> -->
          
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/mytickets*') ? 'active' : '' }}" href="/dashboard/mytickets">
              <span data-feather="credit-card"></span>
              My Ticket
            </a>
          </li>

        </ul>

      @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>User</span>
        </h6>

        <!-- <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/admins*') ? 'active' : '' }} " aria-current="page" href="/dashboard/admins">
              <span data-feather="user"></span>
              Admin
            </a>
          </li>
        </ul>

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }} " aria-current="page" href="/dashboard/users">
              <span data-feather="users"></span>
              User
            </a>
          </li>
        </ul>

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/vendors*') ? 'active' : '' }} " aria-current="page" href="/dashboard/vendors">
              <span data-feather="user-check"></span>
              Vendor
            </a>
          </li>
        </ul> -->

<!-- ----------------------------------------------------- -->
 
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Ticket-Schedule</span>
        </h6>
<!-- 
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/schedules*') ? 'active' : '' }} " aria-current="page" href="/dashboard/addSchedule">
              <span data-feather="grid"></span>
              Add Schedule
            </a>
          </li>
        </ul>

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/schedules*') ? 'active' : '' }} " aria-current="page" href="/dashboard/scheduleHistory">
              <span data-feather="grid"></span>
              Schedule History
            </a>
          </li>
        </ul>
        
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/schedules*') ? 'active' : '' }} " aria-current="page" href="/dashboard/orders">
              <span data-feather="grid"></span>
              Orders Table
            </a>
          </li>
        </ul> -->

<!-- ----------------------------------------------------- -->

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Marketplace</span>
        </h6>

        <!-- <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }} " aria-current="page" href="/dashboard/categories">
              <span data-feather="grid"></span>
              Category
            </a>
          </li>
        </ul> -->

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/types*') ? 'active' : '' }} " aria-current="page" href="/dashboard/types">
              <span data-feather="list"></span>
              Booth Type
            </a>
          </li>
        </ul>
        
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/tickets*') ? 'active' : '' }} " aria-current="page" href="/dashboard/tickets">
              <span data-feather="list"></span>
              Ticket Type
            </a>
          </li>
        </ul>
<!-- -------------------------------------- -->
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Festival</span>
        </h6>

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/abouts*') ? 'active' : '' }} " aria-current="page" href="/dashboard/abouts">
              <span data-feather="home"></span>
              About
            </a>
          </li>
        </ul>
        
        <!-- <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/lineups*') ? 'active' : '' }} " aria-current="page" href="/dashboard/lineups">
              <span data-feather="star"></span>
              Line Up
            </a>
          </li>
        </ul> -->
        
        <!-- <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/sponsors*') ? 'active' : '' }} " aria-current="page" href="/dashboard/sponsors">
              <span data-feather="dollar-sign"></span>
              Sponsor
            </a>
          </li>
        </ul>

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/medias*') ? 'active' : '' }} " aria-current="page" href="/dashboard/medias">
              <span data-feather="camera"></span>
              Media
            </a>
          </li>
        </ul> -->

        <!-- <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/activities*') ? 'active' : '' }} " aria-current="page" href="/dashboard/activities">
              <span data-feather="activity"></span>
              Activity
            </a>
          </li>
        </ul> -->

        <!-- <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/galleries*') ? 'active' : '' }} " aria-current="page" href="/dashboard/galleries">
              <span data-feather="image"></span>
              Gallery
            </a>
          </li>
        </ul> -->
      @endcan

      </div>
    </nav>