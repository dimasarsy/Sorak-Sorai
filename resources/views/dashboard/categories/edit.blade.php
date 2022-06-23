@extends('dashboard.layouts.app')

@section('container')
<h1 class="text-3xl font-black text-center md:text-left mb-5">Edit Post</h1>
<div class="col-lg-8">
    <form action="/dashboard/categories/{{ $categories->id }}" method="POST" novalidate enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="rounded-md max-w-lg">

            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input id="name" name="name" type="text" autocomplete="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $categories->name) }}" autofocus>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input id="slug" name="slug" type="text" readonly autocomplete="slug" class="form-control @error('slug') is-invalid @enderror"  value="{{ old('slug', $categories->slug) }}">
                @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <small class="text-gray-500 font-medium block my-2">Auto generate after you filled field name and click tab.</small>
            </div>

            <button type="submit" class="btn btn-primary mb-5">Edit Product</button>
        </form>
    </div>
</div>

<script>
    const name = document.getElementById('name');
    const slug = document.getElementById('slug');

    name.addEventListener('change', async function() {
        const res = await fetch(`/dashboard/categories/slug?${
            new URLSearchParams({name: this.value})
            .toString()
        }`);
        const data = await res.json();
        slug.value = data.slug;
    });
</script>
@endsection