@extends('dashboard.layouts.app')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-fw fa-dollar-sign"></i> Edit Sponsor</h1>
</div>

<div class="card shadow mb-4">
    <div class="col-lg-10">
        <div class="card-body">
            <form action="/dashboard/sponsors/{{ $sponsor->slug }}" method="POST" novalidate enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name', $sponsor->name) }}" autofocus>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input id="slug" name="slug" type="text" readonly autocomplete="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $sponsor->slug) }}">
                    @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <small class="text-gray-500 font-medium block my-2">Auto generate after you filled field name and click tab.</small>
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input id="link" name="link" type="text" class="form-control @error('link') is-invalid @enderror"  value="{{ old('slug', $sponsor->link) }}" autofocus>
                    @error('link') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            
                <label for="image" class="form-label">Image</label>
                <div class="mb-3">
                    <input type="hidden" name="old-image" value="{{ $sponsor->image }}">
                    @if($sponsor->image)
                        <img class="rounded-md border border-gray-200 hidden mb-3 overflow-hidden " id="img-preview" src="{{ asset('storage/' . $sponsor->image) }}" alt="">
                    @else
                        <img class="rounded-md border border-gray-200 hidden mb-3 overflow-hidden" id="img-preview" alt="">
                    @endif
                        <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" onchange="previewImage();">
                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            
                <button type="submit" class="btn btn-primary mb-5">Update Sponsor</button>
            </form>
        </div>
    </div>
</div>

<script>

    const name = document.getElementById('name');
    const slug = document.getElementById('slug');

    name.addEventListener('change', async function() {
        const res = await fetch(`/dashboard/sponsors/slug?${
            new URLSearchParams({name: this.value})
            .toString()
        }`);
        const data = await res.json();
        slug.value = data.slug;
    });

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
@endsection