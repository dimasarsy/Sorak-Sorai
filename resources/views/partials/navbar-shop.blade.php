<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container  align-items-center">

      <!-- <div class="logo">
        <h1><a href="/"><img src="../img/logofestivo.png" alt=""></a></h1>
      </div> -->

      <!-- Menu Bar -->
      <nav>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>

         <div class="logo">
            <h1><a href="/"><img src="../img/logo.png" alt=""></a></h1>
         </div>

         <div class="nav-items">
            <ul>
              <div class="searchshop-icon">
                  <span class=""><a>Cari</a></span>
              </div>
              <div class="cancelshop-icon">
                  <span class="fas fa-times"></span>
              </div>
              <div class="search">
                  <form action="/posts">
                      @if(request('categories'))
                      <input type="hidden" name="categories"  class="search-data" placeholder="Search..." value="{{ request('categories') }}">
                      @endif
                      <input type="text" name="search" id="search" class="search-data" placeholder="Search..." value="{{ request('search') }}">
                      <button type="submit" class="fas fa-search"></button>
                  </form>
              </div>

              <script>
                  const searchshopBtn = document.querySelector(".searchshop-icon");
                  const cancelshopBtn = document.querySelector(".cancelshop-icon");
                  const formshop = document.querySelector("form");

                  cancelshopBtn.onclick = ()=>{
                  searchshopBtn.classList.remove("hide");
                  cancelshopBtn.classList.remove("show");
                  formshop.classList.remove("active");
                  cancelshopBtn.style.color = "#ff3d00";
                  }
                  searchshopBtn.onclick = ()=>{
                  formshop.classList.add("active");
                  searchshopBtn.classList.add("hide");
                  cancelshopBtn.classList.add("show");
                  }
              </script>
              <!-- <a  href="/about" class="text-base font-medium text-gray-500 hover:text-gray-900 text-decoration-none {{ Request::is('about*') ? 'active' : '' }}"> Cari </a> -->
              <a  href="/lineup" class="text-base font-medium text-gray-500 hover:text-gray-900 text-decoration-none {{ Request::is('lineup*') ? 'active' : '' }}"> Disukai </a>
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
            <ul class="navbar-nav ms-auto">
            @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Halo, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @can('vendor')
                  <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window"></i> My Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                  @endcan
                  @can('admin')
                  <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window"></i> My Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                  @endcan
                  @cannot('vendor')
                  @cannot('admin')
                  <li><a class="dropdown-item" href="/vendors"><i class="bi bi-bag-check"></i> Register as Vendor</a></li>
                  @endcannot
                  @endcannot
                  <li>
                    <form action="/logout" method="post">
                      @csrf
                      @method("DELETE")
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                  </li>
                </ul>
              </li>
              @else
              <a href="/login" class="whitespace-nowrap text-base font-medium text-white hover:text-gray-900 text-decoration-none">Log in</a>
            @endauth
            </ul>

          <!-- @guest
            <a href="/login" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">Log in</a>
            <a href="/register" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">Register</a>
          @endguest -->
            </div>
          </form>
      </nav>
      <!-- End Menu Bar -->

    </div>
    <script>
         const menuBtn = document.querySelector(".menu-icon span");
         const searchBtn = document.querySelector(".search-icon");
         const cancelBtn = document.querySelector(".cancel-icon");
         const items = document.querySelector(".nav-items");
         const form = document.querySelector(".profil");
         menuBtn.onclick = ()=>{
           items.classList.add("active");
           menuBtn.classList.add("hide");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
         cancelBtn.onclick = ()=>{
           items.classList.remove("active");
           menuBtn.classList.remove("hide");
           searchBtn.classList.remove("hide");
           cancelBtn.classList.remove("show");
           form.classList.remove("active");
           cancelBtn.style.color = "#ff3d00";
         }
         searchBtn.onclick = ()=>{
           form.classList.add("active");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
      </script>

  </header><!-- End Header -->