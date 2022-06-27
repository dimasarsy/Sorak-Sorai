<div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(180deg, #080036, #670097 100%);">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
      <div class="sidebar-brand-text mx-3">Sorak-sorai</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    @can('vendor')
    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard-vendor') ? 'active' : '' }}" aria-current="page" href="/dashboard-vendor">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard Vendor</span></a>
    </li>
    @endcan

    @can('admin')
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->

    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
      Users
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard/admins*') ? 'active' : '' }} && {{ Request::is('dashboard/users*')  ? 'active' : '' }} && {{ Request::is('dashboard/vendors*')  ? 'active' : '' }}  collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-user"></i>
        <span>Role</span>
      </a>

      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <!-- <h6 class="collapse-header">Login Screens:</h6> -->
          <a class="collapse-item {{ Request::is('dashboard/admins*') ? 'active' : '' }} " aria-current="page" href="/dashboard/admins">Admin</a>
          <a class="collapse-item {{ Request::is('dashboard/users*') ? 'active' : '' }} " aria-current="page" href="/dashboard/users">User</a>
          <a class="collapse-item {{ Request::is('dashboard/vendors*') ? 'active' : '' }} " aria-current="page" href="/dashboard/vendors">Vendor</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard/pengajuan-vendor*') ? 'active' : '' }} " aria-current="page" href="/dashboard/pengajuan-vendor">
        <i class='fas fa-user-check'></i>
        <span>Vendor Request</span>
      </a>
    </li>
    @endcan
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Markets
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }} && {{ Request::is('dashboard/categories*')  ? 'active' : '' }} collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
                    aria-expanded="true" aria-controls="collapseProduct">
                    <i class="fas fa-fw fa-shopping-bag"></i>
                    <span>Product</span>
                </a>

                <div id="collapseProduct" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">My Product</a>
                        
                        @can('admin')
                        <a class="collapse-item {{ Request::is('dashboard/categories*') ? 'active' : '' }} " aria-current="page" href="/dashboard/categories">Seller categories</a>
                        @endcan
                    </div>
                </div>
            </li> -->

    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" aria-current="page" href="/dashboard/posts">
        <i class="fas fa-fw fa-shopping-bag"></i>
        <span>My Product</span>
      </a>
    </li>

    @can('admin')
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard/addSchedule*') ? 'active' : '' }} && {{ Request::is('dashboard/scheduleHistory*')  ? 'active' : '' }} && {{ Request::is('dashboard/orders*')  ? 'active' : '' }} collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-ticket-alt"></i>
        <span>Ticketing</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Schedule:</h6>
          <a class="collapse-item {{ Request::is('dashboard/addSchedule*') ? 'active' : '' }} " aria-current="page" href="/dashboard/addSchedule">Add Schedule</a>
          <a class="collapse-item {{ Request::is('dashboard/scheduleHistory*') ? 'active' : '' }} " aria-current="page" href="/dashboard/scheduleHistory">Schedule History</a>
          <div class="collapse-divider"></div>
          <h6 class="collapse-header">Ticket:</h6>
          <a class="collapse-item {{ Request::is('dashboard/orders*') ? 'active' : '' }} " aria-current="page" href="/dashboard/orders">User Order</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Festival Set
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard/lineups*') ? 'active' : '' }} " aria-current="page" href="/dashboard/lineups">
        <i class="fas fa-fw fa-music"></i>
        <span>Line Up</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard/sponsors*') ? 'active' : '' }} " aria-current="page" href="/dashboard/sponsors">
        <i class="fas fa-fw fa-dollar-sign"></i>
        <span>Sponsor</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard/medias*') ? 'active' : '' }} " aria-current="page" href="/dashboard/medias">
        <i class="fas fa-fw fa-camera"></i>
        <span>Media</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard/activities*') ? 'active' : '' }} " aria-current="page" href="/dashboard/activities">
        <i class="fas fa-fw fa-list"></i>
        <span>Activity</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard/galleries*') ? 'active' : '' }} " aria-current="page" href="/dashboard/galleries">
        <i class="fas fa-fw fa-image"></i>
        <span>Gallery</span>
      </a>
    </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
</div>