@extends('dashboard.layouts.app')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Product Details</h1>
</div>

<div class="card shadow mb-4">
        <div class="card-body">
            <div class="mt-5 d-flex justify-content-center">
                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> My Products</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Are you sure to delete this post?')" class="btn btn-danger"><span data-feather="x-circle"></span> Delete</button>
                </form>
            </div>
            <section id="festival" class="productpage">
                <div class="outer">
                    <div class="center-wrapper">
                        <div class="container-fluid content">
                            <div class="row">

                            <div class="col-12 col-sm-12 col-lg-6 shoe-slider">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <!-- <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"><img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}'s image" class="d-block w-100" alt="..."></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"><img src="{{ asset('storage/' . $post->image2) }}" alt="{{ $post->title }}'s image" class="d-block w-100" alt="..."></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"><img src="{{ asset('storage/' . $post->image3) }}" alt="{{ $post->title }}'s image" class="d-block w-100" alt="..."></li>
                                </ol> -->

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
                                        <h6 class="card-text mt-5 mb-2"> {!!  \Illuminate\Support\Str::substr($post->body, 0, 495)  !!}...<h6>
                                        
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div> 
                </div>
            </section>

        </div>
    
</div>

@endsection
