@extends('dashboard.layouts.app')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2"><i class="fas fa-fw fa-shopping-bag"></i> My Products</h1>
</div>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
  </symbol>
</svg>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
    <use xlink:href="#check-circle-fill" />
  </svg>
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('deleted'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
    <use xlink:href="#exclamation-triangle-fill" />
  </svg>
  {{ session('deleted') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

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