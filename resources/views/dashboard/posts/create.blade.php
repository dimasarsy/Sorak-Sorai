@extends('dashboard.layouts.app')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-fw fa-shopping-bag"></i> Upload New Product</h1>
</div>

<div class="card shadow mb-4">
    <div class="col-lg-10">
        <div class="card-body">
            <form action="/dashboard/posts" method="POST" novalidate enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror"  value="{{ old('title') }}" autofocus>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input id="slug" name="slug" type="text" readonly autocomplete="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}">
                    @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <small class="text-gray-500 font-medium block my-2">Auto generate after you filled field title and click tab.</small>
                </div>
                
                <label for="description" class="form-label">Price <br><small class="text-gray-500 font-small block my-2">Contoh Penulisan: 200000</small></label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                    <input id="description" name="description" type="text" autocomplete="description" class="form-control @error('description') is-invalid @enderror" rows="3" value="{{ old('description') }}">
                    @error('description')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    
                </div>
                
                <label for="shopeelink" class="form-label">Product On Your Marketplace</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Link</span>
                    <input id="shopeelink" name="shopeelink" type="text" autocomplete="shopeelink" class="form-control @error('shopeelink') is-invalid @enderror" rows="3" value="{{ old('shopeelink') }}">
                    @error('shopeelink')<div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="categories" class="block text-sm font-medium text-gray-700 mb-2">categories</label>
                    <select id="categories" name="categories_id" autocomplete="categories-name" class="form-select form-select-sm ">
                        @can('admin')
                        <option value="1">Koleksi Sorak-Sorai</option>
                        @endcan
                        @can('vendor')
                        <option value="2">Mitra Kami</option>
                        @endcan
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Main Picture</label>
                    <img class="img-preview img-fluid">
                    <img class="rounded-md border border-gray-200 hidden mb-3 overflow-hidden" id="img-preview" alt="">
                    <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" onchange="previewImage();">
                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="image2" class="form-label">2nd Picture</label>
                    <img class="img-preview2 img-fluid">
                    <img class="rounded-md border border-gray-200 hidden mb-3 overflow-hidden" id="img-preview2" alt="">
                    <input id="image2" name="image2" type="file" class="form-control @error('image2') is-invalid @enderror" onchange="previewImage2();">
                    @error('image2')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="image3" class="form-label">3rd Picture</label>
                    <img class="img-preview3 img-fluid">
                    <img class="rounded-md border border-gray-200 hidden mb-3 overflow-hidden" id="img-preview3" alt="">
                    <input id="image3" name="image3" type="file" class="form-control @error('image3') is-invalid @enderror" onchange="previewImage3();">
                    @error('image3')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                
                <div class="mb-3">
                    <label for="body" class="form-label">Content</label>
                    <input id="body" type="hidden" name="body" class="form-control @error('body') is-invalid @enderror" value="{{ old('body') }}">
                    <trix-editor input="body"></trix-editor>
                    @error('body')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <button type="submit" class="btn btn-primary mb-5">Upload Product</button>
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
    function previewImage2(){
        const image2 = document.querySelector('#image2');
        const imgPreview2 = document.querySelector('.img-preview2');

        imgPreview2.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image2.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview2.src = oFREvent.target.result;
        }
    }
    function previewImage3(){
        const image3 = document.querySelector('#image3');
        const imgPreview3 = document.querySelector('.img-preview3');

        imgPreview3.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image3.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview3.src = oFREvent.target.result;
        }
    }

</script>
@endsection