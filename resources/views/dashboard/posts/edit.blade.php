@extends('dashboard.layouts.app')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Product</h1>
</div>

<div class="card shadow mb-4">
    <div class="col-lg-10">
        <div class="card-body">
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" novalidate enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="rounded-md max-w-lg">
            
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" name="title" type="text" autocomplete="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" autofocus>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input id="slug" name="slug" type="text" readonly autocomplete="slug" class="form-control @error('slug') is-invalid @enderror"  value="{{ old('slug', $post->slug) }}">
                        @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <small class="text-gray-500 font-medium block my-2">Auto generate after you filled field title and click tab.</small>
                    </div>
            
                    <label for="description" class="form-label">Price</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Rp. </span>
                        <input id="description" name="description" type="text" autocomplete="description" class="form-control @error('description') is-invalid @enderror" rows="3" value="{{ old('description', $post->description) }}">
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
            
                    <label for="shopeelink" class="form-label">Marketplace Link</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Shopee</span>
                        <input id="shopeelink" name="shopeelink" type="text" autocomplete="shopeelink" class="form-control @error('shopeelink') is-invalid @enderror" rows="3" value="{{ old('shopeelink', $post->shopeelink) }}">
                        @error('shopeelink')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="categories" class="block text-sm font-medium text-gray-700 mb-2">categories</label>
                        <select id="categories" name="categories_id" autocomplete="categories-name" class="form-select form-select-sm">
                            @foreach($categories as $categories)
                            @if( old('categories_id', $post->categories_id) == $categories->id)
                            <option selected value="{{ $categories->id }}">{{ $categories->name }}</option>
                            @else
                            <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
            
                    <label for="image" class="form-label">Main Picture</label>
                    <div class="mb-3">
                        <input type="hidden" name="old-image" value="{{ $post->image }}">
                        @if($post->image)
                        <img class="rounded-md border border-gray-200 hidden mb-3 overflow-hidden" id="img-preview" src="{{ asset('storage/' . $post->image) }}" alt="">
                        @else
                        <img class="rounded-md border border-gray-200 hidden mb-3 overflow-hidden" id="img-preview" alt="">
                        @endif
                            <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" onchange="previewImage();">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
            
                    <label for="image2" class="form-label">2nd Picture</label>
                    <div class="mb-3">
                        <input type="hidden" name="old-image2" value="{{ $post->image2 }}">
                        @if($post->image2)
                            <img class="rounded-md border border-gray-200 hidden mb-3 overflow-hidden" id="img-preview" src="{{ asset('storage/' . $post->image2) }}" alt="">
                        @else
                            <img class="rounded-md border border-gray-200 hidden mb-3 overflow-hidden" id="img-preview" alt="">
                        @endif
                            <input id="image2" name="image2" type="file" class="form-control @error('image2') is-invalid @enderror" onchange="previewImage2();">
                        @error('image2')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
            
                    <label for="image3" class="form-label">3rd Picture</label>
                    <div class="mb-3">
                        <input type="hidden" name="old-image3" value="{{ $post->image3 }}">
                        @if($post->image3)
                            <img class="rounded-md border border-gray-200 hidden mb-3 overflow-hidden" id="img-preview" src="{{ asset('storage/' . $post->image3) }}" alt="">
                        @else
                            <img class="rounded-md border border-gray-200 hidden mb-3 overflow-hidden" id="img-preview" alt="">
                        @endif
                            <input id="image3" name="image3" type="file" class="form-control @error('image3') is-invalid @enderror" onchange="previewImage();">
                        @error('image3')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
            
                    </div>
            
                    <div class="mb-3">
                        <label for="body" class="form-label">Content</label>
                        <input id="body" type="hidden" name="body" class="form-control @error('body') is-invalid @enderror" value="{{ old('body', $post->body) }}">
                        <trix-editor input="body"></trix-editor>
                        @error('body')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
            
                    <button type="submit" class="btn btn-primary mb-5">Edit Product</button>
                </form>
        </div>
    </div>
</div>



<script>
    const title = document.getElementById('title');
    const slug = document.getElementById('slug');

    title.addEventListener('change', async function() {
        const res = await fetch(`/dashboard/posts/slug?${
            new URLSearchParams({title: this.value})
            .toString()
        }`);
        const data = await res.json();
        slug.value = data.slug;
    });
</script>
@endsection