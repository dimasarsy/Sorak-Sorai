@extends('layouts.app')

@section('container')
<section id="festival" class="productpage">
  <div class="outer">
    <div class="center-wrapper">
      <!-- <div class="container-fluid content"> -->
      <div class="row">

        <div class="col-12 col-sm-12 col-lg-6 shoe-slider">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"><img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}'s image"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"><img src="{{ asset('storage/' . $post->image2) }}" alt="{{ $post->title }}'s image2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"><img src="{{ asset('storage/' . $post->image3) }}" alt="{{ $post->title }}'s image3"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}'s image">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('storage/' . $post->image2) }}" alt="{{ $post->title }}'s image2">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('storage/' . $post->image3) }}" alt="{{ $post->title }}'s image3">
              </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>

          </div>
        </div>

        <div class="col-12 col-sm-12 col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-2">{{ $post->title }}</h5>

              @if($post->categories->id === 1)
              <h6 class="card-categories mb-3"><a href="/posts?categories={{ $post->categories->slug }}">{{ $post->categories->name }}</a></h6>
              @else
              <h6 class="card-categories mb-3 d-flex">
                <a href="/posts?categories={{ $post->categories->slug }}">{{ $post->categories->name }} &nbsp; > &nbsp;</a>
                <a href="/vendor/{{ $post->author->username }}">{{ $post->author->username }}</a>
              </h6>
              @endif

              <h4 class="card-price">Rp {{ $post->description }}</h4>
              <h6 class="card-text mt-5 mb-2">{!! \Illuminate\Support\Str::substr($post->body, 0, 500) !!}...<h6>
                  <a href="{{ $post->shopeelink }}" class="btn btn-get-started">Beli Sekarang</a>
            </div>
          </div>
        </div>

      </div>
      <!-- </div> -->
    </div>
  </div>
</section>
@endsection