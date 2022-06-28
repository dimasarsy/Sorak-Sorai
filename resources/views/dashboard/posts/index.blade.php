@extends('dashboard.layouts.app')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2"><i class="fas fa-fw fa-shopping-bag"></i> My Products</h1>
</div>

@include('dashboard.layouts.popup')

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <a href="/dashboard/posts/create" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-upload"></i></span><span class="text">Upload Product</span></a>
  </div>

  <section id="shop" class="shop">
    <div class="koleksi">
      <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
        @foreach($posts as $post)

        <div class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <div class="product-grid mt-5">
            <div class="product-image">
              <img class="img" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->name }}'s image">

              <ul class="product-links">
                <li><a href="/dashboard/posts/{{ $post->slug }}" data-tip="See More"><i class="fas fa-eye"></i></a></li>
                <li><a href="/dashboard/posts/{{ $post->slug }}/edit" data-tip="Edit"><i class="fas fa-edit"></i></a></li>
                <li>
                  <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <!-- <a data-tip="Delete" onclick="return confirm('Are you sure to delete this post?')"><i class="fa fa-trash"></i></a> -->
                    <button data-tip="Delete" class="btn-delete" onclick="return confirm('Are you sure to delete this post?')"><i class="fa fa-trash"></i></button>
                  </form>
                </li>
              </ul>
            </div>
            <div class="product-content">
              <h3 class="title"><a href="/posts/{{ $post->slug }}">{{ \Illuminate\Support\Str::substr($post->title, 0, 10)  }}...</a></h3>

              <div class="price mt-2">Rp {{ number_format($post->description, 2, ',', '.') }}</div>
            </div>
          </div>
        </div>

        @endforeach
      </div>
    </div>
  </section>

  <div class="d-flex justify-content-center">
    {{ $posts->links() }}
  </div>
</div>


@endsection