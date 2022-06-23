@extends('layouts.app')
@section('container')

<div class="container mt-5">

    <br><br><br><br>
    <div>
        <!-- HEADER SHOP -->
        @if($category)
        <div class="section-about mt-5 d-flex justify-content-center">
            <h2 data-aos="fade-left">{{ $category->name }}</h2>
        </div>
        @else
        <div class="section-about mt-5 d-flex justify-content-center">
            <h2 data-aos="fade-left">Belanja</h2>
        </div>
        @endif

        <div class="input-group d-flex justify-content-center mt-4">
        <!-- SEARCH SHOP  -->
        
        <!-- <div class="searchshop-icon">
                <span class="fas fa-search"></span>
            </div>
            <div class="cancelshop-icon">
                <span class="fas fa-times"></span>
            </div>
            <div class="search">
                <form action="/posts">
                    @if(request('category'))
                    <input type="hidden" name="category"  class="search-data" placeholder="Search..." value="{{ request('category') }}">
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
        <br><br> -->



    </div>

</div>

@auth
    @cannot("vendor")
    @cannot("admin")
    <div class="container">
        <div class="d-grid gap-2">
            <a href="/vendors"><button class="btn btn-primary" type="button">Register your Product Now</button></a>
        </div>
    </div>
    @endcannot
    @endcannot
@endauth

<!-- PRODUCT SHOP  -->
@if($posts->count() )

    @if($category)
    
    @else
    <div class="section-shop">
        <h2>Koleksi Sorak-sorai</h2>
        <a href="/posts/posts-koleksi">lihat semua</a>
    </div>
    @endif

    <section id="shop" class="shop">
        <div class="row row-cols-5">
            
            @foreach($posts->slice(5, 5) as $post)
                @if($post->category->id === 1)
                <x-post-card :post="$post" />
                @endif
            @endforeach

        </div>
    </section>
<!-- ------------------------MITRA KITA---------------------------------------------------- -->
    @if($category)
        @foreach($users as $user)
            @if($user->is_vendor === 1)
            <div class="section-shop-dua">
                <h2>{{ $user->username }}</h2>
            </div>
            
            <section id="clients" class="shop">
                <div class="container" data-aos="zoom-in">

                    <div class="product-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper align-items-center">
                            @foreach($posts as $post)
                                @if($post->user_id === $user->id)
                                <div class="swiper-slide"><x-post-card :post="$post" /></div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </section>
            @endif
        @endforeach

<!-- ------------------------------------------------------------------------------------  -->
    @else
    <div class="section-shop-dua">
        <h2>Mitra Kami</h2>
        <a href="/posts?category=mitra-kami">lihat semua </a>
    </div>
    
    <section id="shop" class="shop">
        <div class="row row-cols-5">

            @foreach($posts->slice(0, 5) as $post)
                @if($post->category->id === 2)
                    <x-post-card :post="$post" />
                @endif
            @endforeach
        </div>
    </section>
    
    @endif
    
<!-- ----------------------------------------------------------------------------------------- -->


@else
    <div class="section-title">
        <h1 data-aos="fade-right">Tidak ada Produk Disini</h1>
    </div>
@endif

@endsection