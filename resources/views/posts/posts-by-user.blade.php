@extends('layouts.app')

@section('container')

@if($posts->count())
<section id="shop" class="shop mt-5">
    <div class="container">
        <div class="section-about-categories mt-5 d-flex justify-content-start">
            <h2 data-aos="fade-left">{{ $user->name }}</h2>
        </div>

        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
            @foreach($posts as $post)
            <x-post-card :post="$post" />
            @endforeach
        </div>
    </div>
</section>

@else
<section id="nullable" class="nullable">
    <div class="container mt-5" data-aos="fade-up">
        <div class="section-about-categories mt-5 d-flex justify-content-center mb-5">
            <h2 data-aos="fade-left">{{ $user->name }}</h2>
        </div><br>
        <div class="row justify-content-center text-center mt-5">
            <div class="col-8 col-md-7 col-lg-6">

                <div class="section-penampil mt-5">
                    <div class="fest-img-shop d-flex justify-content-center pulse"><img src="/img/no-product.png"></div>
                    <h5>Maaf, Tidak ada Produk Disini!</h5>
                    <p>Nantikan produk-produk menarik dari Sorak Sorai, dijamin mantapp</p>
                </div>

            </div>
        </div>
    </div>
</section>
@endif
@endsection