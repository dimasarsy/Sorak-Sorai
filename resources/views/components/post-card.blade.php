<!-- --------------------------------------------------------------
# SHOP
-------------------------------------------------------------- -->
<div class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
    <div class="product-grid mt-5">
        <div class="product-image">
            <img class="img" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->name }}'s image">

            <ul class="product-links">
                <li><a href="/posts/{{ $post->slug }}" data-tip="See More"><i class="fas fa-eye"></i></a></li>
            </ul>
        </div>
        <div class="product-content">
            <h3 class="title"><a href="/posts/{{ $post->slug }}">{{  \Illuminate\Support\Str::substr($post->title, 0, 12)  }} ..</a></h3>
            <!-- <a class="vendor" href="/vendor/{{ $post->author->username }}">{{ $post->author->name }}</a> -->
            <div class="price mt-2">Rp {{ number_format($post->description, 2, ',', '.') }}</div>
            @auth
            <a class="buy-now" href="{{ $post->shopeelink }}">Buy Now</a>
            @else
            <a class="buy-now" href="/register">Buy Now</a>
            @endauth
        </div>
    </div>
</div>