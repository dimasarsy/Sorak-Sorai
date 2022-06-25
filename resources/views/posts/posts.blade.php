@extends('layouts.app')
@section('container')

<div class="container mt-3">

    <br><br><br><br>
    <div>
        <!-- HEADER SHOP -->
        @if($categories)
        <div class="section-about-categories mt-3 d-flex justify-content-center">
            <h2 data-aos="fade-left">{{ $categories->name }}</h2>
        </div>
        @else
        <div class="section-about mt-3 d-flex justify-content-center">
            <h2 data-aos="fade-left">Belanja</h2>
        </div>
        @endif

        <div class="input-group d-flex justify-content-center mb-3">

            <!-- SEARCH SHOP  -->
            <div class="searchshop-icon">
                <span class="fas fa-search"></span>
            </div>
            <div class="cancelshop-icon">
                <span class="fas fa-times"></span>
            </div>
            <div class="search">
                <form action="/posts">
                    @if(request('categories'))
                    <input type="hidden" name="categories" class="search-data" value="{{ request('categories') }}">
                    @endif
                    <input type="text" name="search" id="search" class="search-data" value="{{ request('search') }}">
                    <button type="submit" class="fas fa-search"></button>
                </form>
            </div>

            <script>
                const searchshopBtn = document.querySelector(".searchshop-icon");
                const cancelshopBtn = document.querySelector(".cancelshop-icon");
                const formshop = document.querySelector("form");

                cancelshopBtn.onclick = () => {
                    searchshopBtn.classList.remove("hide");
                    cancelshopBtn.classList.remove("show");
                    formshop.classList.remove("active");
                    cancelshopBtn.style.color = "#ff3d00";
                }
                searchshopBtn.onclick = () => {
                    formshop.classList.add("active");
                    searchshopBtn.classList.add("hide");
                    cancelshopBtn.classList.add("show");
                }
            </script>
            <br><br>



        </div>

    </div>


    <!-- PRODUCT SHOP  -->
    @if($posts->count() )
    <!-- ------------------------KOLEKSI SORAK-SORAI---------------------------------------------- -->
    @if($categories)
    @if(request('categories') == 'koleksi-sorak-sorai')

    <section id="shop" class="shop">
        <div class="koleksi">
            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-lg-5">

                @foreach($koleksi as $k)
                <x-post-card :post="$k" />
                @endforeach

            </div>
        </div>
    </section>

    @endif




    <!-- --------------------------------------awalnya------------------------------------------ -->
    @else
    <div class="section-shop">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-5 col-md-4 col-xl-3 d-flex justify-content-start">
                    <h2>Koleksi Sorak-Sorai</h2>
                </div>
                <div class="col-2 col-sm-3 col-md-4 col-xl-3 d-flex justify-content-start">
                    <h3></h3>
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-xl-6 d-flex justify-content-end">
                    <a href="/posts?categories=koleksi-sorak-sorai">lihat semua</a>
                </div>
            </div>
        </div>
    </div>

    <section id="shop" class="shop">
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-lg-5">

            @foreach($posts_koleksi as $posts_koleksi)
            <x-post-card :post="$posts_koleksi" />
            @endforeach

        </div>
    </section>
    @endif

    <!-- ------------------------MITRA KITA---------------------------------------------------- -->

    @if($categories)
    @if(request('categories') == 'mitra-kami')
    @foreach($pengajuans as $pengajuan)

    <div class="section-shop-tiga">
        <div class="container">
            <div class="row">
                <div class="col-5 col-sm-4 col-md-1 col-xl-1 d-flex justify-content-start">
                    <a href="/vendor/{{ $pengajuan->username }}">
                        <img style="width: 50px;" src="{{ asset('storage/' .$pengajuan->foto) }}" alt="{{ $pengajuan->name }}'s logo">
                    </a>
                </div>
                <div class="col-2 col-sm-3 col-md-11 col-xl-11 d-flex justify-content-start">
                    <h3></h3>
                </div>

            </div>
        </div>
    </div>

    <section id="shop" class="shop">
        <div class="container" data-aos="zoom-in">
            <div class="row row-cols">

                <div class="product-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper align-items-center">
                        @foreach($posts as $post)
                        @if($post->user_id === $pengajuan->user_id)
                        <div class="swiper-slide">
                            <x-post-card :post="$post" />
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endforeach

    @endif
    <!-- -------------------------------------awalnya-----------------------------------------------  -->
    @else
    <div class="section-shop-dua">
        <div class="container">
            <div class="row">

                <div class="col-5 col-sm-4 col-md-3 col-xl-2 d-flex justify-content-start">
                    <h2>Mitra Kami</h2>
                </div>
                <div class="col-2 col-sm-3 col-md-4 col-xl-4 d-flex justify-content-start">
                    <h3></h3>
                </div>
                <div class="col-5 col-sm-5 col-md-4 col-xl-6 d-flex justify-content-end">
                    <a href="/posts?categories=mitra-kami">lihat semua </a>
                </div>

            </div>
        </div>
    </div>

    <section id="shop" class="shop">
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">

            @foreach($posts_mitra as $posts_mitra)
            <x-post-card :post="$posts_mitra" />
            @endforeach
        </div>
    </section>
    @endif


    <!-- ----------------------------------------------------------------------------------------- -->


    @else
    <section id="nullable" class="nullable mt-5">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center text-center">
                <div class="col-8 col-md-7 col-lg-6">

                    <div class="section-penampil mt-5">
                        <div class="fest-img-shop d-flex justify-content-center pulse"><img src="img/no-product.png"></div>
                        <h5>Tidak ada Produk Disini</h5>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @endif

@endsection