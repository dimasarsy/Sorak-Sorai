<!-- /*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/ -->
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container">

    <!-- Menu Bar -->
    <nav>

      <div class="menu-icon">
        <span class="fas fa-bars"></span>
      </div>

      <div class="logo">
        <h1><a href="/" class="{{ Request::is('/*') ? 'active' : '' }}"><i class="fa fa-home" aria-hidden="true"></i><img src="../img/soraksorai.png" alt=""></a></h1>
      </div>

      <div class="nav-items">
        <ul>
          <div class="cancel-icon-menu">
            <span class="fas fa-times"></span>
          </div>
          <div class="logo-sidebar">
            <a href="/" class="{{ Request::is('/*') ? 'active' : '' }}"><i class="fa fa-home" aria-hidden="true"></i></a>
          </div>
          <a href="/about" class="text-decoration-none {{ Request::is('about*') ? 'active' : '' }}"> Cerita Kami </a>
          <a href="/upcoming" class="text-decoration-none {{ Request::is('upcoming*') ? 'active' : '' }}"> Yang Akan Datang </a>
          <a href="/posts" class="text-decoration-none {{ Request::is('post*')  ? 'active' : '' }} && {{ Request::is('vendor*')  ? 'active' : '' }}"> Belanja </a>
        </ul>
      </div>

      <div class="search-icon">
        <span class="fas fa-user"></span>
      </div>

      <div class="cancel-icon">
        <span class="fas fa-times"></span>
      </div>

      <div class="profil">
        <div class="search-data flex items-center justify-end md:flex-1 lg:w-0">

          <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            @auth
            <li class="nav-item dropdown">
              @if(Auth::user()->photo == "default.png")
              <img class="img-profile rounded-circle" src="../../../img/default.png">
              @else
              <img class="img-profile rounded-circle" src="{{ asset('storage/' . Auth::user()->photo) }}">
              @endif
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Halo, {{ \Illuminate\Support\Str::words(auth()->user()->name, 2)  }}
              </a>

              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                @cannot('admin')
                <a class="collapse-item" href="/orders"><i class="fas fa-ticket-alt"></i>&emsp;Tiket Saya</a>
                <hr class="dropdown-divider">

                <!-- <a class="collapse-item" href="/orders/riwayat"><span class="iconify" data-icon="fa6-solid:clock-rotate-left"></span>&emsp;Riwayat Tiket</a> -->
                <hr class="dropdown-divider">
                @endcannot

                @can('vendor')
                <a class="collapse-item" href="/dashboard-vendor"><i class="fas fa-fw fa-tachometer-alt"></i>&emsp;Dashboard</a>
                <hr class="dropdown-divider">
                @endcan

                @can('admin')
                <a class="collapse-item" href="/dashboard"><i class="fas fa-fw fa-tachometer-alt"></i>&emsp;Dashboard</a>
                <hr class="dropdown-divider">
                @endcan

                @cannot('vendor')
                @cannot('admin')
                <a class="collapse-item-vendor" href="/pengajuan/create">Daftar Sebagai Mitra</a>
                <hr class="dropdown-divider">
                @endcannot
                @endcannot

                <li>
                  <form action="/logout" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="collapse-item"><i class="fas fa-sign-in-alt"></i>&emsp; Logout</button>
                  </form>
                </li>

              </ul>

            </li>


            @else
            <a href="/login" class="text-decoration-none">Masuk</a>
            @endauth
          </ul>

        </div>
        </form>
    </nav>
    <!-- End Menu Bar -->

  </div>
  <script>
    const menuBtn = document.querySelector(".menu-icon span");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const cancelmenuBtn = document.querySelector(".cancel-icon-menu");
    const items = document.querySelector(".nav-items");
    const form = document.querySelector(".profil");
    menuBtn.onclick = () => {
      items.classList.add("active");
      menuBtn.classList.add("hide");
      searchBtn.style.opacity = "0";
      cancelmenuBtn.classList.add("show");
    }
    cancelBtn.onclick = () => {
      items.classList.remove("active");
      menuBtn.classList.remove("hide");
      searchBtn.classList.remove("hide");
      cancelBtn.classList.remove("show");
      form.classList.remove("active");
      cancelBtn.style.color = "#ff3d00";
    }
    cancelmenuBtn.onclick = () => {
      items.classList.remove("active");
      menuBtn.classList.remove("hide");
      searchBtn.classList.remove("hide");
      searchBtn.style.opacity = "1";
      cancelmenuBtn.classList.remove("show");
      form.classList.remove("active");
      cancelmenuBtn.style.color = "#ff3d00";
    }
    searchBtn.onclick = () => {
      form.classList.add("active");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
      menuBtn.classList.add("hide");

    }
  </script>

</header><!-- End Header -->