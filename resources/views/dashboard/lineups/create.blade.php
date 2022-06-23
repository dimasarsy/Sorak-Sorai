@extends('dashboard.layouts.app')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-fw fa-music"></i> Add New Performance</h1>
</div>

<div class="card shadow mb-4">
    <div class="col-lg-10">
        <div class="card-body">
            <form action="/dashboard/lineups" method="POST" novalidate enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" autofocus>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input id="slug" name="slug" type="text" readonly autocomplete="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}">
                    @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <small class="text-gray-500 font-medium block my-2">Auto generate after you filled field name and click tab.</small>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input id="date" name="date" type="text" class="form-control @error('date') is-invalid @enderror"  value="{{ old('date') }}" autofocus>
                    @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Time</label>
                    <input id="time" name="time" type="text" class="form-control @error('time') is-invalid @enderror"  value="{{ old('time') }}" autofocus>
                    @error('time') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <img class="img-preview img-fluid">
                    <img class="rounded-md border border-gray-200 hidden mb-3 overflow-hidden" id="img-preview" alt="">
                    <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" onchange="previewImage();">
                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            
                <div class="mb-3">
                    <label for="information" class="form-label">Profil</label>
                    <input id="information" type="hidden" name="information" class="form-control @error('information') is-invalid @enderror" value="{{ old('information') }}">
                    <trix-editor input="information"></trix-editor>
                    @error('information')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            
                <button type="submit" class="btn btn-primary mb-5">Add Performance</button>
            </form>

        </div>
    </div>
</div>

<script>

    const name = document.getElementById('name');
    const slug = document.getElementById('slug');

    name.addEventListener('change', async function() {
        const res = await fetch(`/dashboard/lineups/slug?${
            new URLSearchParams({name: this.value})
            .toString()
        }`);
        const data = await res.json();
        slug.value = data.slug;
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })

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